<?php
/*
Write a program to play a word-guessing game like Hangman.

It must randomly choose a word from a list of words.
It must stop when all the letters are guessed.
It must give them limited tries and stop after they run out.
It must display letters they have already guessed (either only the incorrect guesses or all guesses).
-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ _ _ _ _ _ _ _ _

Misses:

Guess:	e

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ _ _ _ _ _ _

Misses:

Guess:	i

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i _ _ _ _ _

Misses:

Guess:	a

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a _ _ a _

Misses:

Guess:	r

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a _ _ a _

Misses:	r

Guess:	s

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a _ _ a _

Misses:	rs

Guess:	t

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a t _ a _

Misses:	rs

Guess:	n

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a t _ a n

Misses:	rs

Guess:	o

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	_ e _ i a t _ a n

Misses:	rso

Guess:	l

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	l e _ i a t _ a n

Misses:	rso

Guess:	v

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	l e v i a t _ a n

Misses:	rso

Guess:	h

-=-=-=-=-=-=-=-=-=-=-=-=-=-

Word:	l e v i a t h a n

Misses:	rso

YOU GOT IT!

Play "again" or "quit"? quit
 */

// Define an array of words for the Hangman game.
$words = [
    "peony", "dahlia", "poppy", "marygold", "snowdrop",
    "calendula", "daisy", "tulip", "jasmine", "lavender",
    "sunflower", "crocus", "hyacinth", "pansy", "hydrangea"
];

// Function to display the word with guessed letters and underscores.
function displayWord($word, $guessedLetters)
{
    $displayedWord = '';
    foreach (str_split($word) as $letter) {
        if (in_array($letter, $guessedLetters)) {
            $displayedWord .= $letter . ' ';
        } else {
            $displayedWord .= '_ ';
        }
    }
    return $displayedWord;
}

// Function to choose a random word from the word list.
function chooseRandomWord($wordList)
{
    return $wordList[array_rand($wordList)];
}

// Function to play the Hangman game.
function playHangman($word)
{
    // Maximum allowed tries before losing the game.
    $maxTries = 7;
    // Array to store guessed letters.
    $guessedLetters = [];
    // Counter for the number of tries.
    $tries = 0;

    // Game loop, continues until the game ends.
    while (true) {
        // Calculate the remaining attempts.
        $attemptsLeft = $maxTries - $tries;
        echo "Attempts left: $attemptsLeft" . PHP_EOL;
        // Display the word with guessed letters and underscores.
        echo "Word: " . displayWord($word, $guessedLetters) . PHP_EOL;
        // Display the letters that were guessed incorrectly.
        echo "Misses: " . implode(", ", array_diff($guessedLetters, str_split($word))) . PHP_EOL;
        // Prompt the player for a guess.
        echo "Guess: ";
        $guess = strtolower(trim(readline()));

        // Validate the guess (must be a single letter).
        if (strlen($guess) !== 1 || !ctype_alpha($guess)) {
            echo "Invalid guess. Please enter a single letter." . PHP_EOL;
            continue;
        }
        // Add the guessed letter to the array.
        $guessedLetters[] = $guess;

        // Check if the guessed letter is not in the word.
        if (strpos($word, $guess) === false) {
            $tries++;
        }

        // Display the current state of the word.
        $displayedWord = displayWord($word, $guessedLetters);
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
        echo "Word: " . $displayedWord . PHP_EOL;

        // Check if the player has won.
        if (str_replace(' ', '', $displayedWord) === $word) {
            echo "YOU GOT IT!" . PHP_EOL;
            return;
        } elseif ($tries === $maxTries) {
            echo "Out of tries! The word was: " . strtoupper($word) . PHP_EOL;
            break;
        }

    }
}

// Main game loop
while (true) {
    // Choose a random word from the list.
    $wordToGuess = chooseRandomWord(($words));

    // Display a message to start a new game.
    echo "Lets play Hangman!" . PHP_EOL;

    // Start the Hangman game with the selected word.
    playHangman($wordToGuess);

    // Check if the player wants to quit.
    $playAgain = strtolower((readline("Play again or quit? ")));
    if ($playAgain === "quit") {
        break; // Exit the loop if the player chooses to quit.
    }
}
echo "Thanks for playing Hangman!" . PHP_EOL;



