<?php
include_once "Trait1.php";
include_once "Trait2.php";
include_once "Trait3.php";

class Test
{
    use Trait1, Trait2, Trait3;

    public function getSum() {
        return $this->method1() + $this->method2() + $this->method3();
    }

}