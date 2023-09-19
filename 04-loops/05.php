<?php

/* Create an associative array with objects of multiple persons.
Each person should have a name, surname, age and birthday.
Using loop (by your choice) print out every persons personal data. */

$inventor = new stdClass();
$inventor->name = "Nikola";
$inventor->surname = "Tesla";
$inventor->age = 86;
$inventor->birthday = "1856-07-10";

$scientist = new stdClass();
$scientist->name = "Albert";
$scientist->surname = "Einstein";
$scientist->age = 76;
$scientist->birthday = "1879-03-14";

$physicist = new stdClass();
$physicist->name = "Julius Robert";
$physicist->surname = "Oppenheimer";
$physicist->age = 62;
$physicist->birthday = "1904-04-22";

$persons =[$inventor, $scientist, $physicist];

foreach ($persons as $person) {
    echo "Name: " . $person->name . PHP_EOL;
    echo "Surname: " . $person->surname . PHP_EOL;
    echo "Age: " . $person->age . PHP_EOL;
    echo "Birthday: " . $person->birthday . PHP_EOL;
    echo PHP_EOL;
}

