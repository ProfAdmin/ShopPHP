<?php

namespace Controller;

use Model\AddProduct;
use Service\CategoryService;
use Service\ProductService;
use View\View;

class ProductController
{
    private CategoryService $categoryService;

    private ProductService $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function showProductByCategory(): void
    {
        $categoryId = $_GET['categoryId'] ?? 0;
        $tplData['productList'] = $this->productService->getByCategory($categoryId);
        $tplData['categoryName'] = $this->categoryService->getById($categoryId)->name;
        View::render('category', $tplData);
    }

    public function showProduct(): void
    {
        $productId = $_GET['productId'] ?? 0;
        $tplData['product'] = $this->productService->getById($productId);
        $tplData['categoryName'] = $this->categoryService->getById($tplData['product']->categoryId)->name;
        View::render('product', $tplData);
    }

    public function showFormAddProduct(): void
    {
        $tplData['listCategories'] = $this->categoryService->getAll();
        View::render('addForm_product', $tplData);
    }

    public function addProduct(): void
    {
        if (!empty($_POST)) {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $picture = $_POST['picture'] ?? '';
            $price = $_POST['price'] ?? 0;
            $categoryId = $_POST['categoryId'] ?? 0;
            $newProduct = new AddProduct($name, $description, $picture, $price, $categoryId);
            $tplData['newId'] = $this->productService->add($newProduct);
        } else {
            $tplData['newId'] = 0;
        }
        View::render('add_product_successful', $tplData);
    }
}