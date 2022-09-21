<?php

use Controller\HomePage;
use Controller\CategoryController;
use Controller\ProductController;

class Route
{
    private HomePage $homePage;

    private CategoryController $categoryController;

    private ProductController $productController;

    public function __construct(
        HomePage $homePage,
        CategoryController $categoryController,
        ProductController $productController
    ) {
        $this->homePage = $homePage;
        $this->categoryController = $categoryController;
        $this->productController = $productController;
    }

    public function start()
    {
        $request = explode("?", $_SERVER['REQUEST_URI']);
        $path = reset($request);
        switch ($path) {
            case '/':
                $this->homePage->show();
                break;
            case '/category/view':
                $this->categoryController->showCategories();
                break;
            case '/product/category':
                $this->productController->showProductByCategory();
                break;
            case '/product/view':
                $this->productController->showProduct();
                break;
            case '/product/addForm':
                $this->productController->showFormAddProduct();
                break;
            case '/product/add':
                $this->productController->addProduct();
                break;
            default:
                echo 'bad request';
        }
    }
}
