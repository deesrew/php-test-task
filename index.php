<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// первое задание
//$obj = new FibonacciNumbers();
//$obj->setLastNumber(64);
//$number = $obj->setFirstNumbers();

// третье задание
$obj = new Figures();
$obj->setFigures();
//var_dump($obj->getFigures());

$circle = new Circle(2);
$obj->saveObjFiguresInFile([$circle]);

$objects = $obj->getFigures();
var_dump($objects);