<?php

namespace controllers;

use models\product;
use views\views;
use models\category;

class productController {

    public static function add() {
        $data = null;
        if(!empty($_POST)) {
            $productId = new product();
            $productId = $productId->addProduct($_POST['name'], $_POST['description'], $_POST['picture'], $_POST['price'], $_POST['category']);
            $data['productId'] = $productId;
        } else {
            $data['valueCategory'] = category::getForSelect();
            $data['productId'] = '';
        }
        views::render('add_product', $data);
    }

    public static function show() {
        $data = null;
        if (isset($_GET['id'])) {
            $data = product::getById($_GET['id']);
            views::render('product', $data);
        }
    }
}