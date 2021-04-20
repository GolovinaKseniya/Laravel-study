<?php

$find_value = 't';
$a = new stdClass();
$array = [['a', 3, 65, 'ft'], ['fd', 4, 615, 't4'], 't'];

var_dump(findValue($a, $array));

function findValue($value, $array)
{
    foreach ($array as $item) {
        if (is_array($item)) {
            $var = findValue($value, $item);
            if (!$var) {
                continue;
            } else {
                return true;
            }
        } else {
            if ($item === $value) {
                return true;
            }
        }
    }
    return false;
}


