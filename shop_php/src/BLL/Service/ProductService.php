<?php

namespace App\BLL\Service;

use App\Entity\Product;
use App\PL\Repository\ProductRepository;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository
    ) {
    }

    public function getById(int $id): Product
    {
        return $this->productRepository->find($id);
    }

    public function getByCategory(int $categoryId): array
    {
        return $this->productRepository->findByCategoryId($categoryId);
    }

    public function add(Product $product): void
    {
        $this->productRepository->add($product, true);
    }
}