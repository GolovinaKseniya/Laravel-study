<?php
/*
 * Написать функцию которая будет генерировать уникальную строку
 * */

function generateUUID()
{
    return generateSymbols(8) . "-" .
        generateSymbols(4) . "-" .
        generateSymbols(4) . "-" .
        generateSymbols(4) . "-" .
        generateSymbols(12);
}

function generateSymbols($quantity)
{
    $res = "";
    $symbols = "abcdef0123456789";


    for ($i = 0; $i < $quantity; $i++) {
        $res .= $symbols[rand(0, strlen($symbols) - 1)];
    }

    return $res;
}

echo generateUUID();
