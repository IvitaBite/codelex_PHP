<?php

// Create an array with integers (up to 10) and print them out using for loop.

$numbers = range(1, 10);

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . PHP_EOL;
}


/*
for ($x = 0; $x <= 10; $x++) {
    echo "$x" . PHP_EOL;
}
*/