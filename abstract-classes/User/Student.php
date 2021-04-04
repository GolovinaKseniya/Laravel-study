<?php
include_once 'User.php';

class Student extends User
{
    private $scolarship;

    public function setScolarship($scolarship)
    {
        $this->scolarship = $scolarship;
    }

    public function getScolarship()
    {
        return $this->scolarship;
    }

    public function increaseRevenue($value)
    {
        return $this->scolarship = $this->scolarship + $value;
    }

    public function decreaseRevenue($value)
    {
        return $this->scolarship = $this->scolarship - $value;

    }
}