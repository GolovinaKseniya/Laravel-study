<?php

/*
 *  Напишите сценарий PHP, который отображает все числа от 200 до 250, делящиеся на 4. Не используя циклы.
 * */

function recursive($number)
{
    if ($number >= 200 && $number <= 250) {
        if ($number % 4 === 0) {
            echo $number;
        }
        $number++;
        recursive($number);
    }
}

recursive(200);