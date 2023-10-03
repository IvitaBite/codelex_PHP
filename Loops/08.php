<?php
/*Write a console program in a class named NumberSquare that prompts the user for two integers,
a min and a max, and prints the numbers in the range from min to max inclusive in a square pattern.
Each line of the square consists of a wrapping sequence of integers increasing from min and max.
The first line begins with min, the second line begins with min + 1, and so on. When the sequence
in any line reaches max, it wraps around back to min. You may assume that min is less than or equal
to max. Here is an example dialogue:

Min? 1
    Max? 5
        12345
23451
34512
45123
51234*/

class NumberSquare
{
    public static function printSquare()
    {
        $min = (int)readline("Min: ");
        $max = (int)readline("Max: ");

        if ($min > $max) {
            echo "Min must be less than or equal to Max\n";
            return;
        }

        for ($row = $min; $row <= $max; $row++) {
            for ($i = $row; $i <= $max; $i++) {
                echo $i;
            }
            for ($j = 0; $j < $row - $min; $j++) {
                echo $min + $j;
            }
            echo "\n";
        }
    }

}

NumberSquare::printSquare();