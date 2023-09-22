<?php

/* Rock Paper Scissors + +
Rock paper scissors
- Iespēja definēt jebkādus elementus (ne tikai akmeni, papīru, šķēres)
- Iespēja pievienot vairākus elementus.
- Viens elements var uzvarēt vairākus elementus
*/

$elements = [
    "fire" => ["earth", "metal", "water", "plant"],
    "water" => ["fire", "metal"],
    "earth" => ["water", "metal"],
    "metal" => ["fire", "earth"],
    "air" => ["fire", "water"],
    "plant" => ["water"],
];

$validChoices = implode(", ", array_map("ucfirst", array_keys($elements)));

while (true) {
    echo ("EPIC " . strtoupper($validChoices) . " BATTLE") . PHP_EOL;
    echo "\n";
    echo "Beating rules: \n";
    foreach ($elements as $element => $beats) {
        echo ucfirst($element) . " beats " . implode(", ", array_map("ucfirst", $beats)) . "; \n";
    }
    echo "\n";
    echo ("The game ends when one of you has scored 3 points.") . PHP_EOL;

    $playerScore = 0;
    $computerScore = 0;
    $round = 1;
    $nameComputer = "PixelWizard";

    while (true) {
        echo "\n";
        echo "Round $round" . PHP_EOL;

        echo "Choose your element ($validChoices): ";
        $playerChoice = strtolower(trim(readline()));

        if (!array_key_exists($playerChoice, $elements)) {
            echo "Invalid choice. Please choose a valid element." . PHP_EOL;
            continue;
        }
        $computerChoice = array_rand($elements);

        if ($playerChoice == $computerChoice) {
            echo "It's a tie!" . PHP_EOL;
        } elseif (in_array($computerChoice, $elements[$playerChoice])) {
            echo "You win! " . ucfirst($playerChoice) . " beats " . ucfirst($computerChoice) . "." . PHP_EOL;
            $playerScore++;
        } else {
            echo "$nameComputer win! " . ucfirst($computerChoice) . " beats " . ucfirst($playerChoice) . "." . PHP_EOL;
            $computerScore++;
        }

        $round++;

        if ($playerScore == 3) {
            echo "\n";
            echo "Congratulations! You won $playerScore rounds out of $round rounds." . PHP_EOL;
            echo "\n";
            break;
        } elseif ($computerScore == 3) {
            echo "\n";
            echo "You lost! $nameComputer won $computerScore rounds out of $round rounds." . PHP_EOL;
            echo "\n";
            break;
        }
    }
    $playAgain = readline("Do you want to play again? (Y/N): ");
    if ($playAgain != "Y" && $playAgain != "y") {
        echo ("Thanks for playing!") . PHP_EOL;
        break;
    }
}


