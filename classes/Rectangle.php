<?php

class Rectangle extends Figures implements iFigure, JsonSerializable
{
    use FigureType;

    /**
     * Ширина фигуры
     */
    private $a;

    /**
     * Длина фигуры
     */
    private $b;

    /**
     * Rectangle constructor.
     * @param false $a
     * @param false $b
     * @throws Exception
     */
    public function __construct($a = false, $b = false)
    {
        /*
         * Валидация сторон фигуры
         */
        if (($a && !is_numeric($a)) || ($b && !is_numeric($b))) {
            throw new Exception('Какая-то из сторон фигуры - не число');
        }

        $this->setA($a);
        $this->setB($b);
        $this->setType();
    }

    /**
     * @return mixed
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @param mixed $a
     */
    public function setA($a): void
    {
        $this->a = $a ?: $this->getRandSide();
    }

    /**
     * @return mixed
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @param mixed $b
     */
    public function setB($b): void
    {
        $this->b = $b ?: $this->getRandSide();
    }

    /**
     * Получаем площадь фигуры
     *
     * @return float|int
     */
    public function getSquare()
    {
        return $this->a * $this->b;
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
            'a' => $this->a,
            'b' => $this->b,
        );
    }

    /**
     * Инициализация объекта класса после json_decode
     *
     * @param stdClass $entry
     * @return Rectangle
     * @throws Exception
     */
    public static function fromStdClass(stdClass $entry): Rectangle
    {
        return new self($entry->a, $entry->b);
    }

}