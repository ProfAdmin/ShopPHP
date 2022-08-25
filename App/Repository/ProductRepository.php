<?php

namespace Repository;

use Models\Product;

class ProductRepository
{
    const FILEPRODUCT = 'products.json';
    private static $instance;
    private FileStorage $storageFile;
    public mixed $allProducts;

    protected function __construct()
    {
        $this->storageFile = new FileStorage();
        $this->allProducts = $this->storageFile->getFromFile(self::FILEPRODUCT);
    }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a ProductRepository.");
    }

    private function save(): void
    {
        $this->storageFile->saveToFile(self::FILEPRODUCT, $this->allProducts);
    }

    public static function getInstance(): self
    {
        if(!self::$instance) {
            self::$instance = new ProductRepository();
        }
        return self::$instance;
    }

    public function getById(int $id): ?Product
    {
        if(array_key_exists($id, $this->allProducts)) {
            $productTmp = $this->allProducts[$id];
            $product = new Product();
            foreach ($productTmp as $fieldKey => $fieldName)
            {
                $product->$fieldKey = $fieldName;
            }
            return $product;
        }
        return null;
    }

    public function add(Product $product): int|false
    {
        if(!isset($product->id)) {
            ksort($this->allProducts);
            $newId = array_key_last($this->allProducts) + 1;
            $product->id = $newId;
            $this->allProducts[$newId] = (array) $product;
            $this->save();
            return $newId;
        }
        return false;
    }

    public function getByCategory(int $idCategory): array
    {
        $arrayProductsTmp = array_filter($this->allProducts, function($product) use($idCategory) {
            return $product['categoryId'] == $idCategory;
        });
        $arrayProducts = [];
        foreach ($arrayProductsTmp as $product) {
            $productObject = new Product();
            foreach ($product as $fieldKey => $fieldName) {
                $productObject->$fieldKey = $fieldName;
            }
            $arrayProducts[] = $productObject;
        }
        return $arrayProducts;
    }
}