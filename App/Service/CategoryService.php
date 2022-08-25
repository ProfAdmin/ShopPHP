<?php

namespace Service;

use Models\Data;
use Views\Views;

class CategoryService
{
    private Data $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function showCategories(): void
    {
        $tplData['listCategories'] = $this->data->categoryRepository->getAll();
        Views::render('category_list', $tplData);
    }
}