<?php

class FiguresCollection
{
    public $figures = [];

    public function addFigure(Figure $f) {
        $this->figures [] = $f;
    }

    public function getSumFigures() {
        $sum = 0;
        foreach ($this->figures as $item) {
            $sum += $item->getSquare();
        }

        return $sum;
    }

    public function getTotalPerimeter() {
        $perimeter = 0;

        foreach ($this->figures as $item) {
            $perimeter += $item->getPerimeter();
        }

        return $perimeter;
    }


}