<?php declare(strict_types=1);

/* Imagine you own a gun store. Only certain guns can be purchased with license types.
Create an object (person) that will be the requester to purchase a gun (object) Person
object has a name, valid licenses (multiple) & cash. Guns are objects stored within an
array. Each gun has license letter, price & name. Using PHP in-built functions determine
if the requester (person) can buy a gun from the store. */


//  using Defined Objects and Classes:
class Person {
    public $name;
    public $licenses = [];
    public $cash;

    public function __construct($name, $cash) {
        $this->name = $name;
        $this->cash = $cash;
    }
    public function addLicenses($licenses) {
        $this->licenses[] = $licenses;
    }
}

class Gun {
    public $name;
    public $licenseLetter;
    public $price;

    public function __construct($name, $licenseLetter, $price) {
        $this->name = $name;
        $this->licenseLetter = $licenseLetter;
        $this->price = $price;
    }
}
$person = new Person("Julius Robert Oppenheimer", 1000);

$person->addLicenses("X");
$person->addLicenses("Y");

$guns = [
    new Gun("Revolver", "X", 560),
    new Gun("Rifle", "Z", 1200),
    new Gun("Handgun", "Y", 950),
];

function canBuy($person, $gun) {
    if(in_array($gun->licenseLetter, $person->licenses) && $person->cash >= $gun->price) {
        return true;
    }
    return false;
}

foreach ($guns as $gun) {
    if (canBuy($person, $gun)) {
        echo "$person->name can buy $gun->name for \$ $gun->price." . PHP_EOL;
    } else {
        echo "$person->name cannot buy $gun->name." . PHP_EOL;
    }
}