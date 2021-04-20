<?php

$find_value = 't';
$array = [['a', 3, 65, 't'], ['fd', 4, 615, 't'], 't'];


function findValue($value, $array, $counter = 0)
{
    foreach ($array as $item) {
        if (is_array($item)) {
            $counter += findValue($value, $item);

        } else {
            if ($item === $value) {
                $counter++;
            }
        }
    }
    return $counter;
}

function findValue2($value, $array, &$counter = 0)
{
    foreach ($array as $item) {
        if (is_array($item)) {
            findValue2($value, $item, $counter);

        } else {
            if ($item === $value) {
                $counter++;
            }
        }
    }
    return $counter;
}

var_dump(findValue2($find_value, $array));
