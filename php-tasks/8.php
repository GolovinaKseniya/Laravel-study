<?php

/*
 * Напишите функцию которя будет преобразовывать первую букву в строке в верхний регистр, а все остальные в нижний.
 */

$string = "wRIte a FUnction to TRanSform a STring";

function firstLetterUppercase($str) {
    $result = explode(" ", $str);

    foreach ($result as &$item) {
        $item = strtolower($item);
    }

    $result[0] = ucfirst($result[0]);

    return implode(" ", $result);
}

echo firstLetterUppercase($string);
