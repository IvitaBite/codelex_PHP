<?php
/*
Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6,
...respectively. Otherwise, it shall print "Not a valid day".

Use:

a "nested-if" statement
a "switch-case-default" statement.
*/

$dayNumber = (int)readline("Enter the day number: ");

// Using a "nested-if" statement
if ($dayNumber >= 0 && $dayNumber <= 6) {
    if ($dayNumber === 0) {
        echo "Sunday\n";
    }
    if ($dayNumber === 1) {
        echo "Monday\n";
    }
    if ($dayNumber === 2) {
        echo "Tuesday\n";
    }
    if ($dayNumber === 3) {
        echo "Wednesday\n";
    }
    if ($dayNumber === 4) {
        echo "Thursday\n";
    }
    if ($dayNumber === 5) {
        echo "Friday\n";
    }
    if ($dayNumber === 6) {
        echo "Saturday\n";
    }
} else {
    echo "Not a valid day\n";
}
/*
// Using "switch-case-default" statement.

switch ($dayNumber) {
    case 0:
        echo "Sunday\n";
        break;
    case 1:
        echo "Monday\n";
        break;
    case 2:
        echo "Tuesday\n";
        break;
    case 3:
        echo "Wednesday\n";
        break;
    case 4:
        echo "Thursday\n";
        break;
    case 5:
        echo "Friday\n";
        break;
    case 6:
        echo "Saturday\n";
        break;
    default:
        echo "Not a valid day\n";
}*/

/*
// Using array

$daysOfWeek = [
    "Sunday",
    "Monday\n",
    "Tuesday\n",
    "Wednesday\n",
    "Thursday\n",
    "Friday\n",
    "Saturday\n",
];
if ($dayNumber >= 0 && $dayNumber <= 6) {
    echo $daysOfWeek[$dayNumber] . "\n";
} else {
    echo "Not a valid day\n";
}*/
