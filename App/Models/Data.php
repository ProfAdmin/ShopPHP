<?php

namespace Models;

use Repository\CategoryRepository;
use Repository\ProductRepository;

class Data
{
    public CategoryRepository $categoryRepository;
    public ProductRepository $productRepository;

    public function __construct()
    {
        $this->categoryRepository = CategoryRepository::getInstance();
        $this->productRepository = ProductRepository::getInstance();
    }
}