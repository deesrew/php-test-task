<?php

class Circle extends Figures implements iFigure, JsonSerializable
{
    private $type;
    private $r;

    public function __construct($r)
    {
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
    public function setR($r): void
    {
        $this->r = $r;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    public function setType(): void
    {
        $this->type = lcfirst(__CLASS__);
    }

    public function __sleep(): array
    {
        return array('type', 'r');
    }

    public function __wakeup(): array
    {
        return array('type', 'r');
    }

    public function getSquare(): float
    {
        $r = $this->r;
        $square = M_PI * pow($r, 2);
        return round($square, 2);
    }

    public function jsonSerialize(): array
    {
        return array(
            'type'  => $this->type,
            'r' => $this->r
        );
    }

    public static function fromStdClass(stdClass $entry): Circle
    {
        return new self($entry->r);
    }
}