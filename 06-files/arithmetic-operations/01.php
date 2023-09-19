<?php

// Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

function checkNr() {
    echo "Enter the number 1: ";
    $num1 = (int) readline();

    echo "Enter the number 2: ";
    $num2 = (int) readline();

    if ($num1 == 15 || $num2 == 15) {
        return true;
    }

    if ($num1 + $num2 == 15) {
        return true;
    }

    if(abs($num1 - $num2) == 15) {
        return true;
    }
    return false;
}

if (checkNr()) {
    echo "True" . PHP_EOL;
} else {
    echo "False" . PHP_EOL;
}