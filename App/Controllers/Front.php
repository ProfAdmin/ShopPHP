<?php
namespace Controllers;

use Views\Views;

class Front {

    public function show() {
        views::render('front');
    }
}