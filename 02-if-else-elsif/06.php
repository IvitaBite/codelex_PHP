<?php

// Create a variable $plateNumber that stores your car plate number.
// Create a switch statement that prints out that its your car in case of your number.

$plateNumber = "IB0612";

switch ($plateNumber) {
    case "IB0612":
        echo "It's your car!" . PHP_EOL;
        break;
    default:
        echo "It's not your car!" . PHP_EOL;
}
