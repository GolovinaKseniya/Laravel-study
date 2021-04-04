<?php
include_once "Figure.php";


class Quadrate implements Figure
{
    public $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getPerimeter()
    {
        return 4 * $this->a;
    }

    public function getSquare()
    {
        return $this->a * $this->a;
    }

    public function getSquarePerimeterSum() {
        return $this->getPerimeter() + $this->getSquare();
    }
}