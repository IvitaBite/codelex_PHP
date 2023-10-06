<?php
/*
See energy-drinks.php
.......
$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed)
{
    throw new LogicException(";(");
}

function calculate_prefer_citrus(int $numberSurveyed)
{
    throw new LogicException(";(");
}


fixme
echo "Total number of people surveyed " . $surveyed;
echo "Approximately " . ? . " bought at least one energy drink";
echo ? . " of those " . "prefer citrus flavored energy drinks.";
......

A soft drink company recently surveyed 12,467 of its customers and
found that approximately 14 percent of those surveyed purchase one or
more energy drinks per week. Of those customers who purchase energy drinks,
approximately 64 percent of them prefer citrus flavored energy drinks.

Write a program that displays the following:

The approximate number of customers in the survey who purchased one or more energy drinks per week
The approximate number of customers in the survey who prefer citrus flavored energy drinks
*/

class SurveyStats
{
    private int $surveyed;
    private int $purchasedEnergyDrinks;
    private int $preferCitrusDrinks;

    public function __construct(int $surveyed, int $purchasedEnergyDrinks, int $preferCitrusDrinks)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }

    public function getSurveyed(): int
    {
        return $this->surveyed;
    }

    public function getPurchasedEnergyDrinks(): int
    {
        return $this->purchasedEnergyDrinks;
    }

    public function getPreferCitrusDrinks(): int
    {
        return $this->preferCitrusDrinks;
    }

    public function calculateEnergyDrinkers(): int
    {
        return round($this->getSurveyed() * ($this->getPurchasedEnergyDrinks() / 100));
    }

    public function calculatePreferCitrusDrinkers(): int
    {
        return round($this->calculateEnergyDrinkers() * ($this->getPreferCitrusDrinks() / 100));
    }
}

$survey = new SurveyStats(12467, 14, 64);

echo "Total number of people surveyed: " . $survey->getSurveyed() . "\n";
echo "Approximately " . $survey->calculateEnergyDrinkers() . " bought at least one energy drink. \n";
echo $survey->calculatePreferCitrusDrinkers() . " of those prefer citrus flavored energy drinks. \n";
