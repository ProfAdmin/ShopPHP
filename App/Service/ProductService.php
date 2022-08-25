<?php

namespace Service;

use Models\Data;
use Models\Product;
use Views\Views;

class ProductService
{
    private Data $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function showProductByCategory(): void
    {
        $idCategory = $_GET['idCategory'] ?? 0;
        $tplData['listProduct'] = $this->data->productRepository->getByCategory($idCategory);
        $tplData['nameCategory'] = $this->data->categoryRepository->getNameById($idCategory);
        Views::render('category', $tplData);
    }

    public function showProduct(): void
    {
        $idProduct = $_GET['idProduct'] ?? 0;
        $tplData['product'] = $this->data->productRepository->getById($idProduct);
        $tplData['nameCategory'] = $this->data->categoryRepository->getNameById($tplData['product']->categoryId);
        Views::render('product', $tplData);
    }

    public function showFormAddProduct(): void
    {
        $tplData['listCategories'] = $this->data->categoryRepository->getAll();
        Views::render('addForm_product', $tplData);
    }

    public function addProduct(): void
    {
        $tplData['newId'] = 0;
        if(!empty($_POST)) {
            $product = new Product();
            $product->name = $_POST['name'] ?? '';
            $product->description = $_POST['description'] ?? '';
            $product->picture = $_POST['picture'] ?? '';
            $product->price = $_POST['price'] ?? 0;
            $product->categoryId = $_POST['categoryId'] ?? 0;
            $tplData['newId'] = $this->data->productRepository->add($product);
        }
        Views::render('add_product_successful', $tplData);
    }
}