<?php
include_once "Figure.php";
include_once "Quadrate.php";
include_once "Reactangle.php";

$q = new Quadrate(3);
echo $q->getSquare()."<br>";
echo $q->getPerimeter()."<br>";
echo $q->getSquarePerimeterSum()."<br>";


$r = new Reactangle(2,4);
echo $r->getSquare()."<br>";
echo $r->getPerimeter()."<br>";
echo $r->getSquarePerimeterSum()."<br>";


