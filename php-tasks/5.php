<?php

$find_value = 't';
$array = [['a', 3, 65, 't'], ['fd', 4, 615, 't'], 't'];

$counter = 0;

function findValue($value, $array, $counter)
{
    foreach ($array as $item) {
        if (is_array($item)) {
            $counter += findValue($value, $item, 0);

        } else {
            if ($item === $value) {
                $counter++;
            }
        }
    }
    return $counter;
}

var_dump(findValue($find_value, $array, $counter));
