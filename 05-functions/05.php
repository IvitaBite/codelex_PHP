<?php declare(strict_types=1);

/* Create a 2D associative array in 2nd dimension with fruits and their weight.
Create a function that determines if fruit has weight over 10kg. Create a secondary
array with shipping costs per weight. Meaning that you can say that over 10 kg shipping
costs are 2 euros, otherwise its 1 euro. Using foreach loop print out the values of the fruits
and how much it would cost to ship this product. */

$fruits = [
    ["name" => "Apple", "weight" => 7],
    ["name" => "Strawberry", "weight" => 11],
    ["name" => "Grapes", "weight" => 3],
    ["name" => "Orange", "weight" => 9],
    ["name" => "Tangerine", "weight" => 15],
];
function isOver($weight): bool {
    return $weight > 10;
}

$shippingCost = [
    "underWeight" => 1,
    "overWeight" => 2,
];

foreach ($fruits as $fruit) {
    $fruitName = $fruit["name"];
    $fruitWeight = $fruit["weight"];
    $cost = isOver($fruitWeight) ? "overWeight" : "underWeight";
    $shippingCost = $shippingCost[$cost];
    echo "Fruit: $fruitName, Weight: $fruitWeight kg, Shipping Cost: $shippingCost euros" . PHP_EOL;
    //echo sprintf("Fruit: %s, Weight: %d kg, Shipping Cost: %d euros", $fruitName, $fruitWeight, $shippingCost) . PHP_EOL;

}



