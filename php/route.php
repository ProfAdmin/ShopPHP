<?php

use controllers\main;
use controllers\productController;
use controllers\categoryController;
class route {
    private $request;

    // make object
    public function __construct() {
        $tmp = explode("?", $_SERVER['REQUEST_URI']);
        $this->request = reset($tmp);
    }

    public function start() {

        switch ($this->request) {
            case '/' :
                main::show();
                break;
            case '/product/add' :
                productController::add();
                break;
            case '/product/category' :
                categoryController::show();
                break;
            case '/product/view' :
                productController::show();
        }
    }
}