<?php

namespace views;

class views {

    public static function render($tpl, $data=null) {
        if(!is_null($data)) {
            extract($data);
        }
        require_once '././views/templates/' . $tpl . '.php';
    }
}