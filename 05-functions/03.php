<?php declare(strict_types=1);

// Create a person object with name, surname and age. Create a function that will determine if the
// person has reached 18 years of age. Print out if the person has reached age of 18 or not.

// Function with return type stdClass
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
 function isAdult(stdClass $person): string {
     if ($person->age >= 18) {
         return "$person->name $person->surname is an adult." . PHP_EOL;
     }
     return "$person->name $person->surname has not reached the age of 18 yet." . PHP_EOL;
 }
foreach ($person as $individual) {
    echo isAdult($individual) . PHP_EOL;
}


/*
// using Defined Objects and Classes
class Person {
    public $name;
    public $surname;
    public $age;

   public function __construct(string $name, string $surname, int $age) {
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

$person = [
    new Person ("Nikola", "Tesla", 86),
    new Person ("Albert", "Einstein", 76),
    new Person ("Julius Robert", "Oppenheimer", 62),
    new Person("Isaac", "Newton", 16),
];
foreach ($person as $individual) {
    if ($individual->isAdult()) {
        echo "$individual->name $individual->surname is an adult." . PHP_EOL;
    } else {
        echo "$individual->name $individual->surname has not reached the age of 18 yet." . PHP_EOL;
    }
}
*/