<?php

/*
 * Write a program that picks a random number from 1-100. Give the user a chance to guess it. If they get it right,
 * tell them so. If their guess is higher than the number, say "Too high." If their guess is lower than the number,
 * say "Too low." Then quit. (They don't get any more guesses for now.)

I'm thinking of a number between 1-100.  Try to guess it.
> 13

Sorry, you are too low.  I was thinking of 34.
I'm thinking of a number between 1-100.  Try to guess it.
> 79

Sorry, you are too high.  I was thinking of 51.
I'm thinking of a number between 1-100.  Try to guess it.
> 42

You guessed it!  What are the odds?!?
 */


while (true) {
    $randomNumber = rand(1, 100);
    echo "I'm thinking of a number between 1-100. Try to guess it." . PHP_EOL;
    echo "You have to guess the number with 3 guesses." . PHP_EOL;
    $guessCounter = 0;
    while ($guessCounter < 3) {
        $userGuess = readline("Your guess: ");

        if (!is_numeric($userGuess)) {
            echo "Please enter a valid number." . PHP_EOL;
            continue;
        }
        $userGuess = (int)$userGuess;
        $guessCounter++;
        if ($userGuess == $randomNumber) {
            echo "You guessed it with $guessCounter guesses! What are the odds?!?";
            break;
        } elseif ($userGuess < $randomNumber) {
            echo "Sorry, you are too low." . PHP_EOL;
        } else {
            echo "Sorry, you are too high." . PHP_EOL;
        }
    }
    if ($guessCounter >= 3) {
        echo "Sorry, you've reached the maximum number of guesses. The number was $randomNumber." . PHP_EOL;
    }
    $playAgain = readline("Do you want to play again? (Y/N): ");
    if ($playAgain != "Y" && $playAgain != "y") {
        echo ("Thanks for playing!") . PHP_EOL;
        break;
    }
}





