<?php

namespace Controller;

use Service\CategoryService;
use View\View;

class CategoryController
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function showCategories(): void
    {
        $tplData['listCategories'] = $this->categoryService->getAll();
        View::render('category_list', $tplData);
    }
}