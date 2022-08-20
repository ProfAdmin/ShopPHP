<?php
namespace controllers;

use views\views;

class main {

    public static function show() {
        views::render('main');
    }
}