<?php

class Figures
{
    public const JSON_FILE_ROOT = 'data/';
    public const JSON_FILE_NAME = 'figures.json';

    private string $file;
    private array $figures = array();

    public function __construct()
    {
        $this->setFile();
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile(): void
    {
        $this->file = self::JSON_FILE_ROOT . self::JSON_FILE_NAME;
    }

    final public function setFigures()
    {
        $figuresArr = json_decode(file_get_contents($this->file), false);
        $figuresObjs = array();

        foreach ($figuresArr as $figureArr) {
            $entryObj = Circle::fromStdClass($figureArr);
            array_push($figuresObjs, $entryObj);
        }

        $this->figures = $figuresObjs;
    }

    final public function getFigures(): array
    {
        return $this->figures;
    }

    public function getFigureObjByType(string $type)
    {

    }

    final public function saveObjFiguresInFile(array $figures)
    {
        $jsonArrObj = json_encode($figures, true);
        file_put_contents($this->file, $jsonArrObj);
    }

}