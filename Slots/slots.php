<?php
/*
Slots:
- Laukuma izmērs 3 x 4
- Iespēja definēt uzvarošās kombinācijas
- Spēlēt atkārtoti
- Uzvarošās kombinācijas piešķirt spēlētājam punktus, atkarībā no tā, kāds elements bija uzvarošajā kombinācijā
- PAR KATRU SPĒLĒŠANAS REIZI NOŅEM X PUNKTUS!!!!

 */

$elements = ["0", "X", "#", "7"];

$pointsMap = [
    "0" => 1,
    "X" => 5,
    "#" => 10,
    "7" => 20
];

$maxRows = 3;
$maxColumns = 4;

// Define winning combinations for wins.
$winningCombinations = [
    // Four horizontal wins
    [
        [0, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [2, 3]
    ],
    // Three horizontals + one diagonal wins
    [
        [0, 0], [0, 1], [0, 2], [1, 3]
    ],
    [
        [1, 0], [0, 1], [0, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [0, 3]
    ],
    [
        [1, 0], [1, 1], [1, 2], [2, 3]
    ],
    [
        [0, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [1, 1], [1, 2], [1, 3]
    ],
    [
        [2, 0], [2, 1], [2, 2], [1, 3]
    ],
    [
        [1, 0], [2, 1], [2, 2], [2, 3]
    ]
];

// Function to display the game board.
function displayBoard(array $board)
{
    foreach ($board as $row) {
        foreach ($row as $element) {
            echo "[$element]";
        }
        echo PHP_EOL;
    }
}

// Function to calculate points based on winning combinations.
function calculatePoint(array $winningCombinations, array $board, array $pointsMap)
{
    // Initialize the total points to 0.
    $points = 0;

    // Iterate through each position in the winning combinations.
    foreach ($winningCombinations as $combo) {
        $win = true;
        // Get the element at the first position in the combo.
        $comboElement = $board[$combo[0][0]][$combo[0][1]];

        foreach ($combo as $position) {
            list($row, $col) = $position;

            // Check if the element at the current position matches the combo element.
            if ($board[$row][$col] !== $comboElement) {
                $win = false;
                break;
            }
        }

        if ($win) {
            // Add the points based on the combo element and pointsMap.
            $points += $pointsMap[$comboElement];
        }
    }

    // Return the total points earned.
    return $points;
}

// Get the starting money from the player.
$currentPoints = (int)readline("Enter your starting money: ");

// Main game loop.
while ($currentPoints >= 5) {
    $board = [];
    // Initialize the game board with random elements.
    for ($row = 0; $row < $maxRows; $row++) {
        for ($column = 0; $column < $maxColumns; $column++) {
            $board[$row][$column] = $elements[array_rand($elements)];
        }
    }
    echo "Current money: $currentPoints" . PHP_EOL;

    // Deduct points for playing.
    $currentPoints -= 5;

    // Spin the slot machine.
    for ($i = 0; $i < $maxRows; $i++) {
        for ($j = 0; $j < $maxColumns; $j++) {
            $board[$i][$j] = $elements[array_rand($elements)];
        }
    }
    displayBoard($board);

    // Check for winning combinations.
    $wonPoints = calculatePoint($winningCombinations, $board, $pointsMap);
    if ($wonPoints > 0) {
        $currentPoints += $wonPoints;
        echo "Congratulations! You won $wonPoints money!" . PHP_EOL;
    } else {
        echo "No winning combinations found." . PHP_EOL;
    }

    if ($currentPoints < 5) {
        echo "Game over! You ran out of money!" . PHP_EOL;
        break;
    }
    // Ask the player if they want to play again.
    $playAgain = strtolower(readline("Do you want to play again and keep the money? (yes/no): "));
    if ($playAgain !== "yes") {
        break;
    }
}

// Display the final money when the game ends.
echo "Thank you for playing. Your final money: $currentPoints" . PHP_EOL;
