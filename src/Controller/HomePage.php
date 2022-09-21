<?php
namespace Controller;

use View\View;

class HomePage {

    public function show() {
        view::render('front');
    }
}