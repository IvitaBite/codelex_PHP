<?php


/* Modify the example program to compute the position of an object after falling for 10 seconds, outputting the
position in meters. The formula in Math notation is:

Gravity formula
x(t) = 0.5 * a * t^2 + vi * t + xi
Variable    Meaning                     Value
a           Acceleration (m/s^2)        -9.81
t           Time (s)                    10
vi          Initial velocity (m/s)      0
xi          Initial position            0
Note: The correct value is -490.5m.
*/
$const = 0.5;
$acceleration = -9.81;

$time = readline("Fall time, s: ");
$initialVelocity = readline("Initial velocity, m/s: ");
$initialPosition = readline("Initial position, m: ");

$position = $const * $acceleration * ($time * $time) + $initialVelocity * $time + $initialPosition;

echo "The change in position of the object after falling for $time seconds is: $position meters." . PHP_EOL;

