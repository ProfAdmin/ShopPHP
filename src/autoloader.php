<?php
// autoloader class
spl_autoload_register(function (string $className) {
    $file = $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    require_once $file;
});