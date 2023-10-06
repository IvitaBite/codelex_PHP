<?php
/*
Write a method named swapPoints that accepts two Points as parameters and swaps their x/y values.

Consider the following example code that calls swapPoints:

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->x . ", " . $p1->y . ")";
echo "(" . $p2->x . ", " . $p2->y . ")";
The output produced from the above code should be:

(-3, 6)
(5, 2)
*/

class Point
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setSwapPoints(Point $pointOne, Point $pointTwo): void
    {
        $tempX = $pointOne->x;
        $tempY = $pointOne->y;
        $pointOne->x = $pointTwo->x;
        $pointOne->y = $pointTwo->y;
        $pointTwo->x = $tempX;
        $pointTwo->y = $tempY;
    }

    public function getSwapPointX(): float
    {
        return $this->x;
    }

    public function getSwapPointY(): float
    {
        return $this->y;
    }

}

$pointOne = new Point(5, 2);
$pointTwo = new Point(-3, 6);

$pointOne->setSwapPoints($pointOne, $pointTwo);

echo "({$pointOne->getSwapPointX()}, {$pointOne->getSwapPointY()})\n";
echo "({$pointTwo->getSwapPointX()}, {$pointTwo->getSwapPointY()})\n";

/*
//using arrays
class Point
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function swapPoints(array $points): void
    {
        $tempX = $points[0]->x;
        $tempY = $points[0]->y;
        $points[0]->x = $points[1]->x;
        $points[0]->y = $points[1]->y;
        $points[1]->x = $tempX;
        $points[1]->y = $tempY;
    }

    public function getSwapPoints(): string
    {
        return "({$this->x}, {$this->y})\n";
    }

}

$points = [
    new Point(5, 2),
    new Point(-3, 6),
];
Point::swapPoints($points);

foreach ($points as $point) {
    /**
     * @var Point $point .
     */
 /*   echo $point->getSwapPoints();
}
*/


/*
// To swap two variables in single line
$points[0]->x ^= $points[1]->x;
$points[1]->x ^= $points[0]->x;
$points[0]->x ^= $points[1]->x;
$points[0]->y ^= $points[1]->y;
$points[1]->y ^= $points[0]->y;
$points[0]->y ^= $points[1]->y;*/

/*
// To swap two variables using array() method:
list($points[0]->x, $points[0]->y, $points[1]->x, $points[1]->y) =
    array($points[1]->x, $points[1]->y, $points[0]->x, $points[0]->y);
*/
