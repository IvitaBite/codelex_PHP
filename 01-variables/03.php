<?php

//Concatenate your name, surname and integer of your age.

$name = "Ivita";
$surname = "Bite";
$age = 31;

echo $name . " " . $surname . " is " . $age . " years old." . PHP_EOL;
echo "$name $surname is $age years old." . PHP_EOL;

$fullName = $name . " " . $surname;

echo $fullName . " is " . $age . " years old." . PHP_EOL;
echo "$fullName}is $age years old." . PHP_EOL;

$full = "$name $surname";

echo $full . " is " . $age . " years old." . PHP_EOL;
echo "$full is $age years old." . PHP_EOL;

$title = "Ivita";
$title .= " " . $surname;

echo $title . " is " . $age . " years old." . PHP_EOL;
echo "$title is $age years old." . PHP_EOL;
