<?php

class Figures
{

    public $square;

    final public static function saveObjFiguresInFile(array $arrObj)
    {
        $serializeArrObj = serialize($arrObj);
        $file = 'figures.txt';
        file_put_contents($file, $arrObj);
    }

}