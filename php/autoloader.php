<?php
// autoloader class
spl_autoload_register(function (string $className) {
    $classPath = str_replace('\\', '/', $className);
    require_once $classPath . '.php';
});