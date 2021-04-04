<?php


class Cube implements iCube
{
    public $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getSquare()
    {
        return 6 * ($this->a * $this->a);
    }

    public function getPerimeter()
    {
        return $this->a * 12;
    }
}