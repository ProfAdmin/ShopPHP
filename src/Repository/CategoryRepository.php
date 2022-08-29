<?php

namespace Repository;

use Model\Category;

class CategoryRepository
{
    private const FILE = 'categories.json';
    private FileStorage $fileStorage;
    public array $categories;

    public function __construct(FileStorage $fileStorage)
    {
        $this->fileStorage = $fileStorage;
        $categoriesRaw = $this->fileStorage->getFromFile(self::FILE);
        $categoriesRaw = array_values($categoriesRaw);
        foreach ($categoriesRaw as $category) {
            $this->categories[$category['id']] = new Category($category['id'], $category['name']);
        }
    }

    public function getAll(): array
    {
        return $this->categories;
    }

    public function getById(int $id): ?Category
    {
        return $this->categories[$id];
    }

    public function getNameById(int $id): ?string
    {
        return $this->categories[$id]->name;
    }
}