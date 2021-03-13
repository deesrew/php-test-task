<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// первое задание
$obj = new FibonacciNumbers();
$obj->setLastNumber(64);
$number = $obj->setFirstNumbers();

// третье задание
$obj = new Rectangle(2,4);
$square = $obj->getSquare();

var_dump($obj);

$objArr[] = $obj;


Figures::saveObjFiguresInFile($objArr);
