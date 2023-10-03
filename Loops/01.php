<?php

//todo write a program that displays first 10 natural numbers

echo "Please enter the selected number range\n";
$start = (int)readline("from: \n");
$end = (int)readline("up to: \n");;
$naturalNumbers = [];
$firstNumbers = 0;
$upperLimit = 10;

if ($start <= $end) {
    for ($i = $start; $i <= $end && $firstNumbers < $upperLimit; $i++) {
        if ($i > 0) {
            $naturalNumbers[] = $i;
            $firstNumbers++;
        }
    }

    $result = implode(" ", $naturalNumbers);
    if ($firstNumbers > 0) {
        echo "The first $firstNumbers natural numbers in the specified range are: $result\n";
    } else {
        echo "The are no positive natural numbers in the specified range.\n";
    }
} else {
    echo "The start value must be less than or equal to the end value. \n";
}


