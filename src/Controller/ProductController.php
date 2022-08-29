<?php

namespace Controller;

use Model\Product;
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
        $tplData['listProduct'] = $this->productService->getByCategory();
        $tplData['nameCategory'] = $this->categoryService->getName();
        View::render('category', $tplData);
    }

    public function showProduct(): void
    {
        $tplData['product'] = $this->productService->getById();
        $tplData['nameCategory'] = $this->categoryService->getName($tplData['product']->categoryId);
        View::render('product', $tplData);
    }

    public function showFormAddProduct(): void
    {
        $tplData['listCategories'] = $this->categoryService->getAll();
        View::render('addForm_product', $tplData);
    }

    public function addProduct(): void
    {
        $tplData['newId'] = $this->productService->add();
        View::render('add_product_successful', $tplData);
    }
}