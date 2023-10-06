<?php
/*
Create a class called Date that includes: three pieces of information as
instance variables — a month, a day and a year.

Your class should have a constructor that initializes the three instance variables and
assumes that the values provided are correct. Provide a set and a get for each instance variable.

Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.

*/

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth(): string
    {
        if ($this->month < 10) {
            return "0" . $this->month;
        }
        return (string)$this->month;
    }

    public function getDay(): string
    {
        if ($this->day < 10) {
            return "0" . $this->day;
        }
        return (string)$this->day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setMonth(int $newMonth): void
    {
        $this->month = $newMonth;
    }

    public function setDay(int $newDay): void
    {
        $this->day = $newDay;
    }

    public function setYear(int $newYear): void
    {
        $this->year = $newYear;
    }

    public function getDisplayDate(): string
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}/";
    }
}

$date = new Date(10, 05, 2023);

echo "Date: " . $date->getDisplayDate() . "\n";

$date->setMonth(6);
$date->setDay(6);
$date->setYear(2021);

echo "Updated Date: " . $date->getDisplayDate() . "\n";