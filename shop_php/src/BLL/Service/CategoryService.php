<?php

namespace App\BLL\Service;

use App\PL\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    public function getAll(): array
    {
        return $this->categoryRepository->findAll();
    }
}