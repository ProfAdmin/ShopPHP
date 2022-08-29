<?php

namespace Service;

use Model\Product;
use Repository\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getByCategory(): ?array
    {
        $categoryId = $_GET['categoryId'] ?? 0;
        return $this->productRepository->getByCategory($categoryId);
    }

    public function getById(): ?Product
    {
        $productId = $_GET['productId'] ?? 0;
        return $this->productRepository->getById($productId);
    }

    public function add(): int
    {
        if (!empty($_POST)) {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $picture = $_POST['picture'] ?? '';
            $price = $_POST['price'] ?? 0;
            $categoryId = $_POST['categoryId'] ?? 0;
            return $this->productRepository->add($name, $description, $picture, $price, $categoryId);
        }
        return 0;
    }
}