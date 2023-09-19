<?php

// Create a non associative array with integers and print out only integers that divides by 3 without any left.

$numbers = range(1, 30);

foreach ($numbers as $number) {
    if ($number % 3 === 0){
        echo $number . PHP_EOL;
    }
}
