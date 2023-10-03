<?php

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

$n = (int)readline("Input number of terms: ");
$base = (int)readline("Input the base number: ");

$result = 1;
for ($i = 1; $i <= $n; $i++) {
    $result *= $base;
}

echo "The result of $base raised to the power of $n is: $result\n";

