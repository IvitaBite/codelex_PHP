<?php

// Write a program that reads a positive integer and count the number of digits the number has.

$numbers = (int)readline("Enter positive integer: ");

if ($numbers <= 0) {
    echo "Not a valid number!\n";
} else {
    echo "The number of digits in $numbers is " . strlen($numbers) . PHP_EOL;
}
