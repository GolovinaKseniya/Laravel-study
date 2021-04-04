<?php


class Cube implements Figure3d
{

    public $a;

    public function getVolume()
    {
        return $this->a * $this->a * $this->a;
    }

    public function getSurfaceSquare()
    {
        return 6* ($this->a * $this->a);
    }
}