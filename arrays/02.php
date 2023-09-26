<?php


$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers

// the average = (sum of numbers) / ( the number of elements in the array)

$average = (array_sum($numbers)) / (count($numbers));

echo "The average value is: " . number_format($average, 2) . PHP_EOL;