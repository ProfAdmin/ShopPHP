<?php

namespace Service;

use Model\AddProduct;
use Model\Product;
use Repository\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getByCategory(int $categoryId): ?array
    {
        return $this->productRepository->getByCategory($categoryId);
    }

    public function getById(int $productId): ?Product
    {
        return $this->productRepository->getById($productId);
    }

    public function add(AddProduct $addProduct): int
    {
        return $this->productRepository->add($addProduct);
    }
}