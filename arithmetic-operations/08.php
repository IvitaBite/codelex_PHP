<?php


/*
Foo Corporation needs a program to calculate how much to pay their hourly employees.
The US Department of Labor requires that employees get paid time and a half for any hours over 40 that they
work in a single week. For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times
their base pay. The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
Foo Corp requires that an employee not work more than 60 hours in a week.

Summary
An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
For every hour over 40, they get overtime = (base pay) × 1.5.
The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
If the number of hours is greater than 60, print an error message.
Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
Write a main method that calls this method for each of these employees:

Employee	Base Pay	Hours Worked
Employee 1	$7.50	    35
Employee 2	$8.20	    47
Employee 3	$10.00	    73
*/

function createPerson(string $employeeName, float $basePay, float $hoursWorked): stdClass
{
    $employee = new stdClass();
    $employee->name = $employeeName;
    $employee->basePay = $basePay;
    $employee->hoursWorked = $hoursWorked;

    return $employee;
}

$employee = [
    createPerson("Nikola Tesla", 7.50, 35),
    createPerson("Albert Einstein", 8.20, 47),
    createPerson("Julius Robert Oppenheimer", 10.00, 73),
];

$const = new stdClass();
$const->minWage = 8.00;
$const->weekHours = 40;
$const->overtimeRate = 1.5;
$const->maxHours = 60;

function totalPay(stdClass $employee, stdClass $const): string
{
    $pay = $const->weekHours * $employee->basePay;
    $underHourPay = $employee->basePay * $employee->hoursWorked;
    if ($employee->hoursWorked > $const->weekHours && $employee->hoursWorked < $const->maxHours) {
        $overTimeHours = $employee->hoursWorked - $const->weekHours;
        $overPay = $overTimeHours * $const->overtimeRate * $employee->basePay;
        $totalPay = $pay + $overPay;
        return "Basic salary: $" . number_format($pay, 2) .
            "\nOvertime: $" . number_format($overPay, 2) .
            "\nTotal pay: $" . number_format($totalPay, 3) . PHP_EOL;
    }
    if ($employee->hoursWorked > $const->maxHours) {
        $overTimeHours = $const->maxHours - $const->weekHours;
        $overPay = $overTimeHours * $const->overtimeRate * $employee->basePay;
        $totalPay = $pay + $overPay;
        return "Basic salary: $" . number_format($pay, 2) .
            "\nOvertime: $" . number_format($overPay, 2) .
            "\nTotal pay: $" . number_format($totalPay, 2) . PHP_EOL;
    }
    return "Total pay: $" . number_format($underHourPay, 2) . PHP_EOL;
}

function errorMessages(stdClass $employee, stdClass $const): string
{
    $errorMessages = "";
    $overHours = $employee->hoursWorked - $const->weekHours;
    $minHours = $const->weekHours - $employee->hoursWorked;
    $maxHours = $employee->hoursWorked - $const->maxHours;
    $unpaid = $maxHours * $const->overtimeRate * $employee->basePay;
    if ($employee->hoursWorked > $const->weekHours && $employee->hoursWorked < $const->maxHours) {
        $errorMessages .= "Please note: 
        $overHours hours of overtime have been worked this week." . PHP_EOL;
    }
    if ($employee->hoursWorked < $const->weekHours) {
        $errorMessages .= "Please note: 
        A full week's workload has not been worked. 
        $minHours hours ($const->weekHours hours) have not been worked." . PHP_EOL;
    }
    if ($const->minWage > $employee->basePay) {
        $errorMessages .= "ATTENTION: 
        Your hourly rate is below the minimum: $" . $employee->basePay . " ($ " . $const->minWage . ").
        Please report this violation to the relevant person/-s and/or agencies." . PHP_EOL;
    }
    if ($employee->hoursWorked > $const->maxHours) {
        $errorMessages .= "Please note: 
        Worked $maxHours hours more than the number of hours per week allowed by the company, 
        which is $const->maxHours hours per week. These hours will not be paid, your loss: $" .
            number_format($unpaid, 2) . '.' . PHP_EOL;
    }
    return $errorMessages;

}

foreach ($employee as $person) {
    echo "Employee: $person->name\n";
    echo totalPay($person, $const);
    echo errorMessages($person, $const);
    echo PHP_EOL;
}
