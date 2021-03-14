<?php

class Rectangle extends Figures implements iFigure
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->setA($a);
        $this->setB($b);
    }

    public function getSquare()
    {
        return $this->a * $this->b;
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

    public function __sleep(): array
    {
        return array('a', 'b');
    }

}