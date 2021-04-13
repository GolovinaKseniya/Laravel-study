<?php

/*
 * Напишите функцию PHP для сравнения двух многомерных массивов и возврата разницы.
 */

$array1 = [[2, 3, 5, 8, 1], [4, 1, 2, 3, 4]];

$array2 = [[2, 3, 5, 8, 1], [4, 1, 2, 3, 4]];


function arrayCompare($arr1, $arr2) {
    $size1 = sizeof($arr1);
    $size1_1 = sizeof($arr1[0]);
    $size2 = sizeof($arr2);

    $diff = [];

    echo $size1."<br>";
    echo $size2."<br>";

    for($i = 0; $i < $size1; $i++) {
        for($j = 0; $j < $size1_1; $j++) {
            if($arr1[$i][$j] !== $arr2[$i][$j]) {
            }
            echo $arr1[$i][$j];
        }
        echo "<br>";
    }
}

arrayCompare($array1, $array2);