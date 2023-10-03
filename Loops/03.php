<?php
/*Write a program that asks the user to enter two words. The program then prints out both words
on one line. The words will be separated by enough dots so that the total line length is 30:

Enter first word:
turtle
Enter second word
153
turtle....................153
This could be used as part of an index for a book. To print out the dots, use echo "." inside a loop body.*/

$firstWord = readline("Enter first word: ");
$secondWord = readline("Enter second word: ");

$totalLength = 30;
$dotLength = $totalLength - strlen($firstWord) - strlen($secondWord);

if ($dotLength >= 0) {
    $output = $firstWord;
    for ($i = 0; $i < $dotLength; $i++) {
        $output .= ".";
    }
    $output .= $secondWord;
    echo $output . "\n";
} else {
    echo "The combined length of the two words exceeds 30 characters.\n";
}

/*
// using str_repeat

if ($dotLength >= 0) {
    $dots = str_repeat(".", $dotLength);
    echo $firstWord . $dots . $secondWord . "\n";
} else {
    echo "The combined length of the two words exceeds 30 characters.\n";
}*/
