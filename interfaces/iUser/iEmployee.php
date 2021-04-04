<?php


interface iEmployee extends iUser
{
    public function getSalary();
    public function setSalary($salary);
}