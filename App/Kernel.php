<?php

use Controllers\Front;
use Models\Data;
use Service\CategoryService;
use Service\ProductService;

final class Kernel
{
    private Route $route;

    public function __construct()
    {
        $data = new Data();
        $front = new Front();
        $categoryService = new CategoryService($data);
        $productService = new ProductService($data);
        $this->route = new Route($front,$productService, $categoryService);
    }

    public function start(): void
    {
        $this->route->start();
    }
}