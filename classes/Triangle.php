<?php

class Triangle extends Figures implements iFigure
{
    private $a;
    private $b;
    private $c;

    public function __construct($a, $b, $c)
    {
        $this->setA($a);
        $this->setB($b);
        $this->setC($c);
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
        $this->a = $a;
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
        $this->b = $b;
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
    public function setC($c): void
    {
        $this->c = $c;
    }

    public function __sleep(): array
    {
        return array('a', 'b', 'c');
    }

    public function getSquare(): float
    {
        $a = $this->a;
        $b = $this->b;
        $c = $this->c;
        $p = ($a + $b + $c) / 2;

        $square = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));

        return round($square, 2);
    }
}