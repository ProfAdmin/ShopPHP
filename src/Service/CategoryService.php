<?php

namespace Service;

use Model\Category;
use Repository\CategoryRepository;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll(): ?array
    {
        return $this->categoryRepository->getAll();
    }

    public function getById(int $categoryId): ?Category
    {
        return $this->categoryRepository->getById($categoryId);
    }
}