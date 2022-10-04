<?php

namespace Repository;

use Model\AddProduct;
use Model\Product;

class ProductRepository
{
    private const FILE = 'products.json';

    private FileStorage $fileStorage;

    public array $products;

    public function __construct(FileStorage $fileStorage)
    {
        $this->fileStorage = $fileStorage;
        $productRaw = $this->fileStorage->getFromFile(self::FILE);
        $productRaw = array_values($productRaw);
        foreach ($productRaw as $product) {
            $this->products[$product['id']] = new Product(
                $product['id'],
                $product['name'],
                $product['description'],
                $product['picture'],
                $product['price'],
                $product['categoryId']
            );
        }
    }

    private function save(): void
    {
        $this->fileStorage->saveToFile(self::FILE, $this->products);
    }

    public function getById(int $id): ?Product
    {
        return $this->products[$id];
    }

    public function add(AddProduct $addProduct): int
    {
        ksort($this->products);
        $newId = array_key_last($this->products) + 1;
        $this->products[$newId] = new Product(
            $newId,
            $addProduct->name,
            $addProduct->description,
            $addProduct->picture,
            $addProduct->price,
            $addProduct->categoryId
        );
        $this->save();

        return $newId;
    }

    public function getByCategory(int $categoryId): ?array
    {
        return array_filter($this->products, function ($product) use ($categoryId) {
            return $product->categoryId == $categoryId;
        });
    }
}
