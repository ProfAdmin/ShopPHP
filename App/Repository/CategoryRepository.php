<?php

namespace Repository;

use Models\Category;

class CategoryRepository
{
    const FILECATEGORY = 'categories.json';
    private static $instance;
    private FileStorage $storageFile;
    public mixed $allCategories;

    protected function __construct()
    {
        $this->storageFile = new FileStorage();
        $this->allCategories = $this->storageFile->getFromFile(self::FILECATEGORY);
    }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a CategoryRepository.");
    }

//    private function save(): void
//    {
//        $this->storageFile->saveToFile(self::FILECATEGORY, $this->allCategories);
//    }

    public static function getInstance(): self
    {
        if(!self::$instance) {
            self::$instance = new CategoryRepository();
        }
        return self::$instance;
    }

    public function getAll(): array
    {
        $arrayCategoriesTmp = array_values($this->allCategories);
        $arrayCategories = [];
        foreach ($arrayCategoriesTmp as $category) {
            $categoryObject = new Category();
            foreach ($category as $fieldKey => $fieldName) {
                $categoryObject->$fieldKey = $fieldName;
            }
            $arrayCategories[] = $categoryObject;
        }
        return $arrayCategories;
    }

    public function getById(int $id): ?Category
    {
        if(array_key_exists($id, $this->allCategories)) {
            $categoryTmp = $this->allCategories[$id];
            $category = new Category();
            foreach ($categoryTmp as $fieldKey => $fieldName)
            {
                $category->$fieldKey = $fieldName;
            }
            return $category;
        }
        return null;
    }

    public function getNameById(int $id): ?string
    {
        return $this->getById($id)->name;
    }

//    public function add(Category $category): int|false
//    {
//        if(is_null($category->id)) {
//            ksort($this->allCategories);
//            $newId = array_key_last($this->allCategories) + 1;
//            $category->id = $newId;
//            $this->allCategories[$newId] = (array) $category;
//            $this->save();
//            return $newId;
//        }
//        return false;
//    }
}