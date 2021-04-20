<?php
/*
 * Напишите сценарий PHP для объединения (используя один массив для ключей и другой для его значений) следующих двух массивов.
 * ('х', 'у', 'у'), (10, 20, 30)
 * */

$arr1 = [10, 20, function () {}];
$arr2 = ['х', 'у', 'f'];

function arrayMerge($arr1, $arr2)
{
    $merge_array = [];
    for ($i = 0; $i < sizeof($arr1); $i++) {
        $merge_array[$arr2[$i]] = $arr1[$i];
    }

    return $merge_array;
}

var_dump(arrayMerge($arr1, $arr2));
