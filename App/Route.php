<?php


use Controllers\Front;
use Service\CategoryService;
use Service\ProductService;

class Route {
    private string $path;
    public CategoryService $categoryService;
    public ProductService $productService;
    public Front $front;

    public function __construct($front, $productService, $categoryService) {
        $this->front = $front;
        $this->productService = $productService;
        $this->categoryService = $categoryService;

        $request = explode("?", $_SERVER['REQUEST_URI']);
        $this->path = reset($request);
    }

    public function start() {

        switch ($this->path) {
            case '/' :
                $this->front->show();
                break;
            case '/category/view' :
                $this->categoryService->showCategories();
                break;
            case '/product/category' :
                $this->productService->showProductByCategory();
                break;
            case '/product/view' :
                $this->productService->showProduct();
                break;
            case '/product/addForm' :
                $this->productService->showFormAddProduct();
                break;
            case '/product/add' :
                $this->productService->addProduct();
                break;
            default:
                echo 'bad request';
        }
    }
}