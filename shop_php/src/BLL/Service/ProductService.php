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

    public function getById($productId): Product
    {
        return $this->productRepository->find($productId);
    }

    public function getByCategory($categoryId): array
    {
        return $this->productRepository->findBy(['categoryId' => $categoryId]);
    }

    public function add(Product $product): void
    {
        $this->productRepository->add($product, true);
    }
}