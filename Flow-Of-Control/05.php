<?php
/* On your phone keypad, the alphabets are mapped to digits as follows:
ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).

Write a program called PhoneKeyPad, which prompts user for a String (case insensitive),
and converts to a sequence of keypad digits.

Use:

a "nested-if" statement
a "switch-case-default" statement
Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,
*/

$phoneKeyPad = strtoupper(readline("Enter a string: "));
$length = strlen($phoneKeyPad);
echo "Keypad digits: ";

$letterToDigit = [
    'A' => '2', 'B' => '22', 'C' => '222',
    'D' => '3', 'E' => '33', 'F' => '333',
    'G' => '4', 'H' => '44', 'I' => '444',
    'J' => '5', 'K' => '55', 'L' => '555',
    'M' => '6', 'N' => '66', 'O' => '666',
    'P' => '7', 'Q' => '77', 'R' => '777', 'S' => '7777',
    'T' => '8', 'U' => '88', 'V' => '88',
    'W' => '9', 'X' => '99', 'Y' => '999', 'Z' => '9999',
];

for ($i = 0; $i < $length; $i++) {
    $char = $phoneKeyPad[$i];
    if ($char >= 'A' && $char <= 'Z') {
        if ($char === ' ') {
            echo ' ';
        } else {
            echo $letterToDigit[$char] . " ";
        }
    } else {
        // For other characters
        echo $char;
    }
}
echo "\n";
