<?php

class Figures
{
    /**
     * Директория с файлами
     *
     * @var string
     */
    public const JSON_FILE_ROOT = 'data/';

    /**
     * Имя файла с фигурами
     *
     * @var string
     */
    public const JSON_FILE_NAME = 'figures.json';

    /**
     * Массив с типами фигур и их классовыми именами
     *
     * @var array
     */
    public const FIGURES_TYPE = array(
        'circle' => 'Circle',
        'rectangle' => 'Rectangle',
        'triangle' => 'Triangle',
    );

    /**
     * Минимальное количество фигур при генерации
     *
     * @var int
     */
    public const MIN_FIGURES = 1;

    /**
     * Максимальное количество фигур при генерации
     *
     * @var int
     */
    public const MAX_FIGURES = 10;

    /**
     * Минимальная длина стороны(радиуса) фигуры
     *
     * @var int
     */
    public const MIN_SIDE_LENGTH = 1;

    /**
     * Максимальная длина стороны(радиуса) фигуры
     *
     * @var int
     */
    public const MAX_SIDE_LENGTH = 10;

    /**
     * Количество знаков в дробной части при генирации стороны
     *
     * @var int
     */
    public const FRACTIONAL_NUMBER = 2;

    /**
     * Путь к файлу
     *
     * @var string
     */
    private string $file;

    /**
     * Массив с фигурами
     *
     * @var array
     */
    private array $figures = array();

    /**
     * Figures constructor.
     */
    public function __construct()
    {
        $this->setFile();
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function setFile(): void
    {
        $this->file = self::JSON_FILE_ROOT . self::JSON_FILE_NAME;
    }

    /**
     * Получаем фигуры (из файла)
     *
     * @return void
     */
    final public function setFigures()
    {
        $figuresArr = json_decode(file_get_contents($this->file), false);
        $figuresObjs = array();

        foreach ($figuresArr as $figureArr) {
            $className = self::FIGURES_TYPE[$figureArr->type];
            $entryObj = $className::fromStdClass($figureArr);
            array_push($figuresObjs, $entryObj);
        }

        $this->figures = $figuresObjs;
    }

    final public function getFigures(): array
    {
        return $this->figures;
    }

    /**
     * Сохраняем фигуры в файл
     *
     * @param array $figures
     */
    final public function saveObjFiguresInFile(array $figures = array())
    {
        if (empty($figures)) {
            $jsonArrObj = json_encode($this->figures, true);
        } else {
            $jsonArrObj = json_encode($figures, true);
        }
        file_put_contents($this->file, $jsonArrObj);
    }

    /**
     * Генерируем фигуры
     */
    final public function generateFigures()
    {
        $figuresCount = rand(self::MIN_FIGURES, self::MAX_FIGURES);
        $figures = array();
        for ($i = 0; $i < $figuresCount; ++$i) {
            $randFigureType = array_rand(self::FIGURES_TYPE, 1);
            $randClassName = self::FIGURES_TYPE[$randFigureType];
            $figure = new $randClassName();
            array_push($figures, $figure);
        }
        $this->figures = $figures;
    }

    /**
     * Генерируем длину стороны(радиуса)
     *
     * @return float|int
     */
    public function getRandSide()
    {
        return rand(
                self::MIN_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER),
                self::MAX_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER)
            ) / pow(10, self::FRACTIONAL_NUMBER);
    }

    /**
     * Сортировка фигур по площали
     */
    final public function sortFiguresBySquare()
    {
        usort($this->figures, function ($figureOne, $figureTwo) {
            return ($figureOne->getSquare() - $figureTwo->getSquare());
        });
    }

}