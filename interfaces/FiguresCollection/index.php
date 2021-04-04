<?php

include_once "FiguresCollection.php";
include_once "Reactangle.php";
include_once "Quadrate.php";

$fc = new FiguresCollection();
$fc->addFigure(new Reactangle(2,1));
$fc->addFigure(new Quadrate(4));

echo "<br>".$fc->getSumFigures();
echo "<br>".$fc->getTotalPerimeter();