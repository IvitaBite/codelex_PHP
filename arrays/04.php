<?php
/*
Write a program that creates an array of ten integers. It should put ten random numbers from 1 to 100 in the array.
It should copy all the elements of that array into another array of the same size.

Then display the contents of both arrays. To get the output to look like this, you'll need a several for loops.

Create an array of ten integers
Fill the array with ten random numbers (1-100)
Copy the array into another array of the same capacity
Change the last value in the first array to a -7
Display the contents of both arrays
Array 1: 45 87 39 32 93 86 12 44 75 -7
Array 2: 45 87 39 32 93 86 12 44 75 50
*/

// Two empty arrays to hold the random numbers
$arrayOne = [];
$arrayTwo = [];

// Fill the array with ten random numbers form 1 to 100
for ($i = 0; $i < 10; $i++) {
    // Generate a random number between 1 and 100.
    $randomNumber = rand(1, 100);
    // Add the random number to the first array.
    $arrayOne[] = $randomNumber;
    // Copy the same random number to the second array.
    $arrayTwo[] = $randomNumber;
}

// Other copying options:
//$arrayTwo = $arrayOne;
//$arrayTwo = unserialize(serialize($arrayOne));
//$arrayTwo = array_replace([], $arrayOne);

// Change the last value in the first array to -7.
$arrayOne[count($arrayOne) - 1] = -7;

// Display the contents of both arrays
echo "Array One: ";
foreach ($arrayOne as $value) {
    echo $value . " ";
}
echo PHP_EOL;

echo "Array Two: ";
foreach ($arrayTwo as $value) {
    echo $value . " ";
}
echo PHP_EOL;