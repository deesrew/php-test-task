<?php

trait FigureType
{
    /**
     * Тип фигуры
     *
     * @var string
     */
    private string $type;

    /**
     * Геттер типа фигуры
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Сеттер типа фигуры
     */
    public function setType(): void
    {
        $this->type = lcfirst(__CLASS__);
    }
}