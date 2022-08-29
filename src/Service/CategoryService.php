<?php

namespace Service;

use Repository\CategoryRepository;
use View\Views;

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

    public function getName(int $categoryId = null): ?string
    {
        $categoryId = is_null($categoryId) ? $_GET['categoryId'] ?? 0 : $categoryId;
        return $this->categoryRepository->getNameById($categoryId);
    }
}