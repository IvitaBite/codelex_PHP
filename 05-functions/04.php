<?php declare(strict_types=1);

// Create an array of objects that uses the function of exercise 3 but in
// loop printing out if the person has reached age of 18.

// Function with return type stdClass:

function createPerson(string $name, string $surname, int $age): stdClass {
    $person = new StdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;

    return $person;
}
$person = [
    createPerson("Nikola", "Tesla", 86),
    createPerson("Albert", "Einstein", 76),
    createPerson("Julius Robert", "Oppenheimer", 62),
    createPerson("Isaac", "Newton", 16),
];
function isAdult(stdClass $person): bool {
    return $person->age >= 18;
}

foreach ($person as $individual) {
    if (isAdult($individual)) {
        echo "$individual->name $individual->surname is an adult." . PHP_EOL;
    } else {
        echo "$individual->name $individual->surname has not reached the age of 18 yet." . PHP_EOL;
    }
}

/*
// using Defined Objects and Classes:

class Person {
    public $name;
    public $surname;
    public $age;

    public function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }
    public function isAdult() {
        if ($this->age >= 18) {
            return true;
        }
        return false;

    }
}

$persons = [
    new Person ("Nikola", "Tesla", 86),
    new Person ("Albert", "Einstein", 76),
    new Person ("Julius Robert", "Oppenheimer", 86),
    new Person("Isaac", "Newton", 16),
];

foreach ($persons as $person) {
    if ($person->isAdult()) {
        echo "$person->name $person->surname has reached the age of 18 or older." . PHP_EOL;
    } else {
        echo "$person->name $person->surname has not reached the age of 18 yet." . PHP_EOL;
    }
}
*/

