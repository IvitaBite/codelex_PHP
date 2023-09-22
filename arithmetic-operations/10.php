<?php
/* echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle";
echo "2. Calculate the Area of a Rectangle";
echo "3. Calculate the Area of a Triangle";
echo "4. Quit\n";
echo "Enter your choice (1-4) : ";

Design a Geometry class with the following methods:

A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
Area = π * r * 2
Use Math.PI for π and r for the radius of the circle
A static method that accepts the length and width of a rectangle and returns the area of the rectangle.
Use the following formula:
Area = Length x Width
A static method that accepts the length of a triangle’s base and the triangle’s height.
The method should return the area of the triangle. Use the following formula:
Area = Base x Height x 0.5
The methods should display an error message if negative values are used for the circle’s radius,
the rectangle’s length or width, or the triangle’s base or height.

Next write a program to test the class, which displays the following menu and responds to the user’s selection:

Geometry calculator:

Calculate the Area of a Circle
Calculate the Area of a Rectangle
Calculate the Area of a Triangle
Quit
Enter your choice (1-4):

Display an error message if the user enters a number outside the range of 1 through 4 when selecting
an item from the menu. */

function circleArea($radius)
{
    if ($radius < 0) {
        return "Error: Negative radius is not allowed.";
    }
    $area = M_PI * $radius * $radius;
    return number_format($area, 2);
}

function rectangleArea($length, $width)
{
    if ($length < 0 || $width < 0) {
        return "Error: Negative length or width is not allowed.";
    }
    $area = $length * $width;
    return number_format($area, 2);
}

function triangleArea($base, $height)
{
    if ($base < 0 || $height < 0) {
        return "Error: Negative base or height is not allowed.";
    }
    $area = 0.5 * $base * $height;
    return number_format($area, 2);
}

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";
echo "Enter your choice (1-4): ";


while (true) {
    $choice = readline();
    if ($choice == 1) {
        $radius = readline("Enter the radius of the circle: ");
        echo "Area of the circle: " . circleArea($radius) . PHP_EOL;
    }
    if ($choice == 2) {
        $length = readline("Enter the length of the rectangle: ");
        $width = readline("Enter the width of the rectangle: ");
        echo "Area of the rectangle: " . rectangleArea($length, $width) . PHP_EOL;
    }
    if ($choice == 3) {
        $base = readline("Enter the base of the triangle: ");
        $height = readline("Enter the height of the triangle: ");
        echo "Area of the triangle: " . triangleArea($base, $height) . PHP_EOL;
    }
    if ($choice > 4 || $choice <= 0) {
        echo "Invalid choice. Please enter a number between 1 and 4.\n";
    }
    if ($choice == 4) {
        echo("Goodbye!\n");
        break;
    }
    echo "Enter your choice (1-4) : ";
}

/*
// switch

while (true) {
    $choice = readline();
    switch ($choice) {
        case 1:
            $radius = readline("Enter the radius of the circle: ");
            echo "Area of the circle: " . circleArea($radius) . PHP_EOL;
            break;
        case 2:
            $length = readline("Enter the length of the rectangle: ");
            $width = readline("Enter the width of the rectangle: ");
            echo "Area of the rectangle: " . rectangleArea($length, $width) . PHP_EOL;
            break;
        case 3:
            $base = readline("Enter the base of the triangle: ");
            $height = readline("Enter the height of the triangle: ");
            echo "Area of the triangle: " . triangleArea($base, $height) . PHP_EOL;
            break;
        case 4:
            exit("Goodbye!\n");
        default:
            echo "Invalid choice. Please enter a number between 1 and 4.\n";
    }
    echo "Enter your choice (1-4) : ";
}
*/
/*
//  using Defined Objects and Classes:
class GeometryCalculator
{
    public function circleArea($radius)
    {
        if ($radius < 0) {
            return "Error: Negative radius is not allowed.";
        }
        $area = M_PI * $radius * $radius;
        return number_format($area, 2);
    }

    public function rectangleArea($length, $width)
    {
        if ($length < 0 || $width < 0) {
            return "Error: Negative length or width is not allowed.";
        }
        $area = $length * $width;
        return number_format($area, 2);
    }

    public function triangleArea($base, $height)
    {
        if ($base < 0 || $height < 0) {
            return "Error: Negative base or height is not allowed.";
        }
        $area = 0.5 * $base * $height;
        return number_format($area, 2);
    }
}

$geometryCalculator = new GeometryCalculator();

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";
echo "Enter your choice (1-4): ";

while (true) {
    $choice = readline();
    if ($choice == 1) {
        $radius = readline("Enter the radius of the circle: ");
        echo "Area of the circle: " . $geometryCalculator->circleArea($radius) . PHP_EOL;
    }
    if ($choice == 2) {
        $length = readline("Enter the length of the rectangle: ");
        $width = readline("Enter the width of the rectangle: ");
        echo "Area of the rectangle: " . $geometryCalculator->rectangleArea($length, $width) . PHP_EOL;
    }
    if ($choice == 3) {
        $base = readline("Enter the base of the triangle: ");
        $height = readline("Enter the height of the triangle: ");
        echo "Area of the triangle: " . $geometryCalculator->triangleArea($base, $height) . PHP_EOL;
    }
    if ($choice > 4 || $choice <= 0) {
        echo "Invalid choice. Please enter a number between 1 and 4.\n";
    }
    if ($choice == 4) {
        echo("Goodbye!\n");
        break;
    }
    echo "Enter your choice (1-4) : ";
}
*/