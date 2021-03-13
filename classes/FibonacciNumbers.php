<?php

class FibonacciNumbers
{
    private array $numbers = array();
    private $lastNumber;

    public function __construct()
    {
        $this->setNumbers();
    }

    /**
     * @return string|int
     */
    public function getLastNumber()
    {
        return $this->lastNumber;
    }

    /**
     * @param string|int $lastNumber
     * @return void
     */
    public function setLastNumber($lastNumber): void
    {
        $this->lastNumber = $lastNumber - 1;
    }

    /**
     * @return void
     */
    public function setNumbers(): void
    {
        $this->numbers = array(1, 1);
    }

    /**
     * @return array
     */
    public function getNumbers(): array
    {
        return $this->numbers;
    }

    /**
     * @return array
     * @var int|string $count
     */
    public function setFirstNumbers(): array
    {
        for ($i = 1; $i < $this->lastNumber; ++$i) {
            $this->numbers[] = $this->numbers[$i] + $this->numbers[$i - 1];
        }
        return $this->numbers;
    }

}

