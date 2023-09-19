<?php

/* Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
Range should be stored within the 2 separated variables $y and $z. */

$intVar = 50;
$y = 20;
$z = 70;

if ($intVar >= $y && $intVar <= $z) {
    echo "Correct!" . PHP_EOL;
} else {
    echo "False!" . PHP_EOL;
}