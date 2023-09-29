<?php
//todo print if number is positive or negative

$number = (int)readline("Enter the number: ");

if ($number > 0) {
    echo "The number is positive.\n";
} elseif ($number < 0) {
    echo "The number is negative.\n";
} else {
    echo "The number is zero.\n";
}

