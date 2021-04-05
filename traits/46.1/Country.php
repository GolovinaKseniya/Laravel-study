<?php
include_once "Helper.php";

class Country
{
    use Helper;

    public $population;

    public function __construct($name, $age, $population)
    {
        $this->name = $name;
        $this->age = $age;
        $this->population = $population;
    }

    public function getPopulation() {
        return $this->population;
    }
}