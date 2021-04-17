<?php

/*
 * Напишите функцию которя будет преобразовывать первую букву в строке в верхний регистр, а все остальные в нижний.
 */

$string = "wRIte a FUnction to TRanSform a STring";

function firstLetterUppercase($str) {
    $result = explode(" ", $str);
    for($i = 0; $i < sizeof($result); $i++) {
        $result[$i] = strtolower($result[$i]);
    }

    $result[0] = ucfirst($result[0]);

    return implode(" ", $result);
}

echo firstLetterUppercase($string);
