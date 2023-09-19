<?php

// Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd,
// or “Even Number” otherwise. The program shall always print “bye!” before exiting.

echo "Check the Number - Odd or Even\n";

function checkOddEven() {
    echo "Enter the number: ";
    $number = (int) readline();

    if ($number % 2 == 0) {
        echo "Even Number!\n";
    } else {
        echo "Odd Number!\n";
    }
    echo "bye!\n";
}
checkOddEven();

