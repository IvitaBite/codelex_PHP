<?php

/* Write a program that calculates and displays a person's body mass index (BMI).
A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
Where weight is measured in pounds and height is measured in inches. Display a message indicating
...whether the person has optimal weight, is underweight, or is overweight. A sedentary person's weight
...is considered optimal if his or her BMI is between 18.5 and 25. If the BMI is less than 18.5, the person
...is considered underweight. If the BMI value is greater than 25, the person is considered overweight.

Your program must accept metric units.
*/
echo "BMI Calculator\n";
echo "\n";
echo "Select the unit system for weight and height:\n";
echo "1. Metric (kg, cm)\n";
echo "2. Imperial (lb, in)\n";
$unitSystem = (int)readline("Enter your choice (1 or 2): ");

if ($unitSystem === 1) {
    $weightPrompt = "Enter your weight in kg: ";
    $heightPrompt = "Enter your height in cm: ";
} elseif ($unitSystem === 2) {
    $weightPrompt = "Enter your weight in lb: ";
    $heightPrompt = "Enter your height in in: ";
} else {
    echo "Invalid choice. Please select 1 or 2 for the unit system.\n";
    exit(1);
}

$weight = (float)readline($weightPrompt);
$height = (float)readline($heightPrompt);

function calculateBMI($weight, $height, $unitSystem)
{
    if ($unitSystem === 1) {
        $heightF = $height / 100;
        $const = 1;
    } elseif ($unitSystem === 2) {
        $heightF = $height;
        $const = 703;
    }
    $bmi = (($weight / ($heightF * $heightF)) * $const);
    return $bmi;
}

function classifyBMI($bmi)
{
    $min = 18.5;
    $max = 25;
    if ($bmi < $min) {
        return "underweight" . PHP_EOL;
    }
    if ($bmi >= $min && $bmi <= $max) {
        return "optimal weight" . PHP_EOL;
    }
    return "overweight" . PHP_EOL;
}

$bmi = calculateBMI($weight, $height, $unitSystem);
$classification = classifyBMI($bmi);

echo "Your BMI is: " . number_format($bmi, 2) . PHP_EOL;
echo "You are classified as: " . $classification . PHP_EOL;
