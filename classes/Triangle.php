<?php

class Triangle extends Figures implements iFigure, JsonSerializable
{
    use FigureType;

    /**
     * Первая сторона фигуры
     */
    private $a;

    /**
     * Вторая сторона фигуры
     */
    private $b;

    /**
     * Третья сторона фигуры
     */
    private $c;

    /**
     * Triangle constructor.
     * @param false $a
     * @param false $b
     * @param false $c
     * @throws Exception
     */
    public function __construct($a = false, $b = false, $c = false)
    {
        /*
         * Валидация сторон фигуры
         */
        if (($a && !is_numeric($a)) || ($b && !is_numeric($b)) || ($c && !is_numeric($c))) {
            throw new Exception('Какая-то из сторон фигуры - не число');
        }

        /*
         * Проверяем правильность треугольника
         */
        if (($a > ($b + $c)) || ($b > ($a + $c)) || ($c > ($a + $b))) {
            throw new Exception('Неправильный треугольник');
        }

        $this->setA($a);
        $this->setB($b);
        $this->setC($c);
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
    public function setA($a = false): void
    {
        $this->a = $a ?: rand(
                self::MIN_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER),
                self::MAX_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER)) /
            pow(10, self::FRACTIONAL_NUMBER);
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
    public function setB($b = false): void
    {
        $this->b = $b ?: rand(
                self::MIN_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER),
                self::MAX_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER)) /
            pow(10, self::FRACTIONAL_NUMBER);
    }

    /**
     * @return mixed
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * @param mixed $c
     */
    public function setC($c = false): void
    {
        $this->c = $c ?: rand(
                self::MIN_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER),
                self::MAX_SIDE_LENGTH * pow(10, self::FRACTIONAL_NUMBER)) /
            pow(10, self::FRACTIONAL_NUMBER);

        /*
         * Нет необходимости проверять все стороны на правильность тругольника
         * Если треугольник неправильный, снова генерируем третью сторону
         */
        if (($this->a > ($this->b + $this->c)) || ($this->b > ($this->a + $this->c)) || ($this->c > ($this->a + $this->b))) {
            $this->setC();
        }
    }

    /**
     * Получаем площадь фигуры
     *
     * @return float
     */
    public function getSquare(): float
    {
        $a = $this->a;
        $b = $this->b;
        $c = $this->c;
        $p = ($a + $b + $c) / 2;

        $square = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));

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
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c
        );
    }

    /**
     * Инициализация объекта класса после json_decode
     *
     * @param stdClass $entry
     * @return Triangle
     * @throws Exception
     */
    public static function fromStdClass(stdClass $entry): Triangle
    {
        return new self($entry->a, $entry->b, $entry->c);
    }
}