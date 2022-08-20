<?php

namespace controllers;

use models\category;
use models\product;
use views\views;

class categoryController {

    public static function show() {
        $data = null;
        if(isset($_GET['id'])) {
            $data['linkCategory'] = '';
            $data['nameCategory'] = category::getById($_GET['id']);
            $data['listProduct'] = product::getListProduct($_GET['id']);
        } else {
            $data['linkCategory'] = category::getForLink();
            $data['nameCategory'] = 'All';
            $data['listProduct'] = '';
        }
        views::render('category', $data);
    }
}