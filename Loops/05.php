<?php
/*Write a console program in a class named Piglet that implements a simple 1-player d
ice game called "Piglet" (based on the game "Pig"). The player's goal is to accumulate
as many points as possible without rolling a 1. Each turn, the player rolls the die; if
they roll a 1, the game ends and they get a score of 0. Otherwise, they add this number
to their running total score. The player then chooses whether to roll again, or end the
game with their current point total. Here is an example dialogue where the user plays
until rolling a 1, which ends the game with 0 points:

Welcome to Piglet!
You rolled a 5!
Roll again? yes
You rolled a 4!
Roll again? yes
You rolled a 1!
You got 0 points.
Here is another example dialogue where the user stops early and gets to end the game with 10 points:

Welcome to Piglet!
You rolled a 6!
Roll again? y
You rolled a 2!
Roll again? y
You rolled a 2!
Roll again? n
You got 10 points.
    */

class Piglet
{
    public static function playGame()
    {
        echo "Welcome to Piglet!\n";

        $totalScore = 0;

        while (true) {
            $roll = rand(1, 6);
            echo "You rolled a $roll!\n";
            if ($roll === 1) {
                $totalScore = 0;
                echo "You got $totalScore points.\n";
                break;
            } else {
                $totalScore += $roll;
                $choice = strtolower(trim(readline("Roll again? (y/n) ")));
                if ($choice !== "y") {
                    echo "You got $totalScore points.\n";
                    break;
                }
            }

        }
    }
}

Piglet::playGame();