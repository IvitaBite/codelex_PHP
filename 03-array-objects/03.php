<?php

// Given object
// Using dump method, dump out all 3 values.

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

var_dump($person->name) . PHP_EOL;
var_dump($person->surname) . PHP_EOL;
var_dump($person->age) . PHP_EOL;