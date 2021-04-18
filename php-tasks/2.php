<?php
include_once "4.php";
/*
 * Напишите функцию PHP для сравнения двух многомерных массивов и возврата разницы.
 */

$array_m_f = [[1, 3, 5], [1, 2], [4, 5, 6, 7, 8], [18]];

$array_m_s = [[1, 3, 5], [1, 9], [4, 5, 6, 8, [25]]];


function arrayDifference($array1, $array2)
{
    return array_merge(findDiffArray($array1, $array2), findDiffArray($array2, $array1));
}

function findDiffArray($array, $array2)
{
    $diff = [];

    foreach ($array as $item) {
        if (is_array($item)) {
            $result = findDiffArray($item, $array2);
            if (sizeof($result) !== 0) {
                $diff = array_merge($diff, $result);
            }
        } else {
            if (findValue($item, $array2)) {
                continue;
            } else {
                $diff [] = $item;
            }
        }
    }
    return $diff;
}

var_dump(arrayDifference($array_m_s, $array_m_f));