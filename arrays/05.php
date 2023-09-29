<?php
/*
Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.

(...a game already in progress)

	X   O
	O X X
	  X O
 
'O', choose your location (row, column): 0 1

	X O O
	O X X
	  X O
 
'X', choose your location (row, column): 2 0

	X O O
	O X X
	X X O

The game is a tie.




function display_board()
{
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
}
*/

$board = [
    [' ', ' ', ' '],
    [' ', ' ', ' '],
    [' ', ' ', ' '],
];

// Defined winning combinations.
$winningCombinations = [
    // Rows wins.
    [
        [0, 0], [0, 1], [0, 2],
    ],
    [
        [1, 0], [1, 1], [1, 2],
    ],
    [
        [2, 0], [2, 1], [2, 2],
    ],
    // Columns wins.
    [
        [0, 0], [1, 0], [2, 0],
    ],
    [
        [0, 1], [1, 1], [2, 1],
    ],
    [
        [0, 2], [1, 2], [2, 2],
    ],
    // Diagonal from top-left to bottom-right win.
    [
        [0, 0], [1, 1], [2, 2],
    ],
    // Diagonal from top-right to bottom-left win.
    [
        [0, 2], [1, 1], [2, 0],
    ],
];

$player = 'X';
$gameOver = false;

// A function to display the game board.
function displayBoard(array $board)
{
    echo " " . $board[0][0] . " | " . $board[0][1] . " | " . $board[0][2] . "\n";
    echo "---+---+---\n";
    echo " " . $board[1][0] . " | " . $board[1][1] . " | " . $board[1][2] . "\n";
    echo "---+---+---\n";
    echo " " . $board[2][0] . " | " . $board[2][1] . " | " . $board[2][2] . "\n";
}

// A function to check if there is a winning combination
function checkWinner(array $board, array $winningCombinations, $player)
{
    foreach ($winningCombinations as $combo) {
        $win = true;
        foreach ($combo as $position) {
            [$row, $col] = $position;
            if ($board[$row][$col] !== $player) {
                $win = false;
                break;
            }
        }
        if ($win) {
            return true;
        }
    }
    // No winning combinations found.
    return false;
}

// A function to check if there is a tie - if the board is full (no empty spaces).
function checkTie(array $board)
{
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($board[$i][$j] == ' ') {
                return false;
            }
        }
    }
    return true;
}

// A function to make moves and check if the selected location is valid or not.
function makeMove(&$board, $player, $row, $col)
{
    if ($row < 0 || $row > 2 || $col < 0 || $col > 2 || $board[$row][$col] != ' ') {
        return false;
    }
    $board[$row][$col] = $player;
    return true;
}

// Main game loop.

while (!$gameOver) {
    displayBoard($board);
    $move = readline("$player, choose your location (row, column): ");
    list($row, $col) = explode(' ', $move);
    if (makeMove($board, $player, $row, $col)) {
        if (checkWinner($board, $winningCombinations, $player)) {
            displayBoard($board);
            echo "Player '$player' wins!\n";
            $gameOver = true;
        } elseif (checkTie($board)) {
            displayBoard($board);
            echo "It's a tie!\n";
            $gameOver = true;
        } else {
            // For switching players.
            $player = ($player == 'X') ? 'O' : 'X';
        }

    } else {
        echo "Invalid move! Try again!\n";
    }
}
