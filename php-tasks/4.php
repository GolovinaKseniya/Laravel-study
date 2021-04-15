<?php

$find_value = 't';
$array = [['a', 3, 65, 'ft'], ['fd', 4, 615, 't4'], 't'];

function findValue($value, $array)
{
    foreach ($array as $item) {
        if (is_array($item)) {
            $var = findValue($value, $item);
            if (!$var) {
                continue;
            } else return true;
        } else {
            if ($item === $value) {
                return true;
            }
        }
    }
    return false;
}

var_dump(findValue($find_value, $array));
