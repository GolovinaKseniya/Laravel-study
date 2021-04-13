<?php

/*
 * Напишите сценарий PHP для удаления определенного значения из массива с помощью функции array_filter().
 */

$array = [1, 2, 3, 4, 5];

print_r($array);

function removeElement($v, $k)
{
    return $v !== 1;
}

print_r(array_filter($array, "removeElement", ARRAY_FILTER_USE_BOTH));

