<?php

use Service\CategoryService;
use Service\ProductService;
use Repository\FileStorage;
use Repository\CategoryRepository;
use Repository\ProductRepository;
use Controller\CategoryController;
use Controller\ProductController;
use Controller\HomePage;

final class Kernel
{
    private Route $route;

    public function __construct()
    {
        $fileStorage = new FileStorage();
        $categoryRepository = new CategoryRepository($fileStorage);
        $productRepository = new ProductRepository($fileStorage);
        $categoryService = new CategoryService($categoryRepository);
        $productService = new ProductService($productRepository);
        $categoryController = new CategoryController($categoryService);
        $productController = new ProductController($categoryService, $productService);
        $homePage = new HomePage();
        $this->route = new Route($homePage, $categoryController, $productController);
    }

    public function start(): void
    {
        $this->route->start();
    }
}