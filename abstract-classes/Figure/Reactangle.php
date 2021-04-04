<?php


class Reactangle extends Figure
{
    public $a, $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getPerimeter()
    {
        return ($this->a + $this->b) * 2;
    }

    public function getSquare()
    {
        return $this->a * $this->b;
    }

    public function getSquarePerimeterSum() {
        return $this->getPerimeter() + $this->getSquare();
    }
}