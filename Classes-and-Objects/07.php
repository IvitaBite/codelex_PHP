<?php

/*
The questions in this exercise all deal with a class Dog that you have to program from scratch.

Create a class Dog. Dogs should have a name, and a sex.
Make a class DogTest with a Main method in which you create the following Dogs:
Max, male
Rocky, male
Sparky, male
Buster, male
Sam, male
Lady, female
Molly, female
Coco, female
Change the Dog class so that each dog has a mother and a father.
Add to the main method in DogTest, so that:
Max has Lady as mother, and Rocky as father
Coco has Molly as mother, and Buster as father
Rocky has Molly as mother, and Sam as father
Buster has Lady as mother, and Sparky as father
Change the dog class to include a method fathersName that return the name of the father.
If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
referenceToCoco.FathersName() returns the string "Buster"
referenceToSparky.FathersName() returns the string "Unknown"
Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog). T
he method should return true on the call
referenceToCoco.HasSameMotherAs(referenceToRocky). Show that the new method works in the DogTest main method.
*/

class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = null;
        $this->father = null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMother(): ?Dog
    {
        return $this->mother;
    }

    public function getFather(): ?Dog
    {
        return $this->father;
    }

    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }

    public function getFatherName(): string
    {
        if ($this->getFather() === null) {
            return "Unknown";
        } else {
            return $this->getFather()->getName();
        }
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if ($this->getMother() !== null && $otherDog->getMother() !== null) {
            if ($this->getMother() === $otherDog->getMother()) {
                return true;
            }
        }
        return false;
    }

}

class DogTest
{
    public static function main(): void
    {
        $dogs = [
            new Dog("Max", "male"),
            new Dog("Rocky", "male"),
            new Dog("Sparky", "male"),
            new Dog("Buster", "male"),
            new Dog("Sam", "male"),
            new Dog("Lady", "female"),
            new Dog("Molly", "female"),
            new Dog("Coco", "female"),
        ];
        $dogs[0]->setMother($dogs[5]);
        $dogs[0]->setFather($dogs[1]);
        $dogs[7]->setMother($dogs[6]);
        $dogs[7]->setFather($dogs[3]);
        $dogs[1]->setMother($dogs[6]);
        $dogs[1]->setFather($dogs[4]);
        $dogs[3]->setMother($dogs[5]);
        $dogs[3]->setFather($dogs[2]);

        echo "{$dogs[7]->getName()}'s father is {$dogs[7]->getFatherName()}.\n";
        echo "{$dogs[2]->getName()}'s father is {$dogs[2]->getFatherName()}.\n";

        if ($dogs[7]->hasSameMotherAs($dogs[1])) {
            echo "{$dogs[7]->getName()} and {$dogs[1]->getName()} have the same mother.\n";
        } else {
            echo "{$dogs[7]->getName()} and {$dogs[1]->getName()} do not have the same mother.\n";
        }

    }
}

DogTest::main();