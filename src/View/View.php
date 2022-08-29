<?php

namespace View;

class View {

    public static function render(string $tpl, array $data=null): void
    {
        if(!is_null($data)) {
            extract($data);
        }
        require_once '././View/templates/' . $tpl . '.php';
    }
}