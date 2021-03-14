<?php

class Circle extends Figures implements iFigure, JsonSerializable
{
    use FigureType;

    /**
     * Раудиус фигуры
     */
    private $r;

    /**
     * Circle constructor.
     * @param false $r
     * @throws Exception
     */
    public function __construct($r = false)
    {
        /*
         * Валидация сторон фигуры
         */
        if ($r && !is_numeric($r)) {
            throw new Exception('Радиус - не число');
        }

        $this->setR($r);
        $this->setType();
    }

    /**
     * @return mixed
     */
    public function getR()
    {
        return $this->r;
    }

    /**
     * @param mixed $r
     */
    public function setR($r = false): void
    {
        $this->r = $r ?: $this->getRandSide();
    }

    /**
     * Получаем площадь фигуры
     *
     * @return float
     */
    public function getSquare(): float
    {
        $r = $this->r;
        $square = M_PI * pow($r, 2);
        return round($square, 2);
    }

    /**
     * Возвращаемые поля при json_encode
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array(
            'type' => $this->type,
            'r' => $this->r
        );
    }

    /**
     * Инициализация объекта класса после json_decode
     *
     * @param stdClass $entry
     * @return Circle
     * @throws Exception
     */
    public static function fromStdClass(stdClass $entry): Circle
    {
        return new self($entry->r);
    }
}