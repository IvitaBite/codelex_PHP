<?php


$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: ";
for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . "; ";
}

//todo
//sort arrays in ascending order
sort($numbers);
echo "\nSorted numeric array: ";
for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . "; ";
}

//sort arrays in descending order
rsort($numbers);
echo "\nSorted numeric array: ";
for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . "; ";
}

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "\nOriginal string array: ";
for ($i = 0; $i < count($words); $i++) {
    echo $words[$i] . "; ";
}

//todo
//sort arrays in ascending order
sort($words);
echo "\nSorted string array: ";
for ($i = 0; $i < count($words); $i++) {
    echo $words[$i] . "; ";
}

//sort arrays in descending order
rsort($words);
echo "\nSorted string array: ";
for ($i = 0; $i < count($words); $i++) {
    echo $words[$i] . "; ";
}
echo PHP_EOL;