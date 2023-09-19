<?php declare(strict_types=1);

// Create a function that accepts 2 integer arguments. First argument is a base value and the second
// one is a value its been multiplied by. For example, given argument 10 and 5 prints out 50
function multiplyAndPrint() {
    echo "Enter the base value: ";
    $base = (int) readline();

    echo "Enter the multiplier: ";
    $multiplier = (int) readline();

    $result = $base * $multiplier;
    echo "Result: " . $result . PHP_EOL;
}

multiplyAndPrint();

/*
function multiplyAndPrint(int $base, int $multiplier): int {
    $result = $base * $multiplier;
    echo $result;
}

// Example:

multiplyAndPrint(10, 5);
 */