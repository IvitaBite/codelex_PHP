<?php
//todo check if an array contains a value user entered

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];
// Prompt the user to enter a value to search for.
echo "Enter the value to search for: ";
// Read and store the user's input as an integer.
$valueToSearch = (int)readline();

// Check if the entered value exist in the array.
if (in_array($valueToSearch, $numbers)) {
    echo "The value $valueToSearch is in the array." . PHP_EOL;
}
echo "The value $valueToSearch is not in the array." . PHP_EOL;




