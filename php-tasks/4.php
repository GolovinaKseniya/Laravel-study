<?php

$find_value = 't';

$array = [['a', 3, 65, 'ft'], ['fd', 4, 615, 't']];

function findValue($value, $array)
{
    foreach ($array as $item) {
        if (is_array($item)) {
            findValue($value, $item);
        } else {
            if ($item == $value) {
                var_dump($value);
            }
        }
    }
}

var_dump(findValue($find_value, $array));