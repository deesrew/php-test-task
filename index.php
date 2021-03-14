<?php

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/classes/' . $class . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// первое задание
$fibonacci = new FibonacciNumbers();
$fibonacci->setLastNumber(64);
$fibonacci->setFirstNumbers();
var_dump($fibonacci->getNumbers());

// второе задание
Library::getAuthorsFromQuery();

// третье задание
$figures = new Figures();
$figures->generateFigures();
$figures->saveObjFiguresInFile();
var_dump($figures->getFigures());
$figures->sortFiguresBySquare();
var_dump($figures->getFigures());