<?php

//Create a non-associative array with 3 integer values and display the total sum of them.

$numbers = array(3, 7, 10);
// $number = [3, 7, 10];
$totalSum = array_sum($numbers);

echo "The total sum of the numbers is: " . $totalSum . PHP_EOL;

echo array_sum($numbers) . PHP_EOL;

echo "The total sum of the numbers is: " . array_sum($numbers) . PHP_EOL;

