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
var_dump($obj->getNumbers());

// второе задание
Library::getAuthorsFromQuery();

// третье задание
$obj = new Figures();
$obj->generateFigures();
$obj->saveObjFiguresInFile();
var_dump($obj->getFigures());
$obj->sortFiguresBySquare();
var_dump($obj->getFigures());