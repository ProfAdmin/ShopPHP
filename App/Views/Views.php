<?php

namespace Views;

class Views {

    public static function render(string $tpl, array $data=null): void
    {
        if(!is_null($data)) {
            extract($data);
        }
        require_once '././Views/templates/' . $tpl . '.php';
    }
}