<?php
include_once 'Student.php';
include_once 'Employee.php';

$student = new Student();
$student->setName('John');
$student->setScolarship(1200);
echo $student->getName()."<br>";
echo $student->getScolarship()."<br>";
echo $student->increaseRevenue(2300)."<br>";

$employee = new Employee();
$employee->setName('Sam');
$employee->setSalary(2100);
echo $employee->getName()."<br>";
echo $employee->getSalary()."<br>";
echo $employee->increaseRevenue(4100)."<br>";
