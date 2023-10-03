<?php
/*
Write a console program in a class named AsciiFigure that draws a figure of the following form, using for loops.

////////////////\\\\\\\\\\\\\\\\
////////////********\\\\\\\\\\\\
////////****************\\\\\\\\
////************************\\\\
********************************
Then, modify your program using an integer class constant so that it can create a similar figure of any size.
For instance, the diagram above has a size of 5. For example, the figure below has a size of 3:

////////\\\\\\\\
////********\\\\
****************
And the figure below has a size of 7:

////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////********\\\\\\\\\\\\\\\\\\\\
////////////////****************\\\\\\\\\\\\\\\\
////////////************************\\\\\\\\\\\\
////////********************************\\\\\\\\
////****************************************\\\\
************************************************
*/


class AsciiFigure
{
    const SIZE = 5;

    public static function drawFigure()
    {
        for ($i = 1; $i <= self::SIZE; $i++) {
            for ($j = 1; $j <= self::SIZE * 4 - 4 * $i; $j++) {
                echo "/";
            }
            for ($j = 1; $j <= 8 * $i - 8; $j++) {
                echo "*";
            }
            for ($j = 1; $j <= self::SIZE * 4 - 4 * $i; $j++) {
                echo "\\";
            }
            echo "\n";
        }
    }
}

echo "Figure with size " . AsciiFigure::SIZE . ":\n";

AsciiFigure::drawFigure();


// using str_repeat
/*
class AsciiFigure
{
    const SIZE = 5;

    public static function drawFigure()
    {
        for ($i = 1; $i <= self::SIZE; $i++) {
            $slashes = str_repeat("/", self::SIZE * 4 - 4 * $i);
            $stars = str_repeat("*", 8 * $i - 8);
            $backslashes = str_repeat("\\", self::SIZE * 4 - 4 * $i);

            echo $slashes . $stars . $backslashes . "\n";
        }
    }
}

echo "Figure with size " . AsciiFigure::SIZE . ":\n";

AsciiFigure::drawFigure();
*/



