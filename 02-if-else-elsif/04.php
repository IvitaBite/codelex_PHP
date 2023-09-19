<?php

/* By your choice, create condition with 3 checks.
For example, if value is greater than X, less than Y and is an even number. */

$value = 46;
$x = 1;
$y = 100;

if ($value > $x && $value < $y && $value % 2 == 0) {
    echo "The $value meets all three conditions." . PHP_EOL;
} else {
    echo "The $value does not meet all three conditions." . PHP_EOL;
}
