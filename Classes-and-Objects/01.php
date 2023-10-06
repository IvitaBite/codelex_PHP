<?php

/*
Create a class Product that represents a product sold in a shop. A product has a price, amount and name.

The class should have:

A constructor Product  __construct(string name, float startPrice, int amount)
A function printProduct() that prints a product in the following form:
Banana, price 1.1, amount 13
Test your code by creating a class with main method and add three products there:

"Logitech mouse", 70.00 EUR, 14 units
"iPhone 5s", 999.99 EUR, 3 units
"Epson EB-U05", 440.46 EUR, 1 units
Print out information about them.

Add new behaviour to the Product class:

possibility to change quantity
possibility to change price
Reflect your changes in a working application.
*/

class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->startPrice;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setPrice(float $newPrice): void
    {
        $this->startPrice = $newPrice;
    }

    public function setQuantity(int $newQuantity): void
    {
        $this->amount = $newQuantity;
    }

    public function getProduct(): string
    {
        return "{$this->getName()}, price: {$this->getPrice()} EUR, amount: {$this->getAmount()} units";
    }
}

$products = [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1),
];

foreach ($products as $product) {
    echo $product->getProduct() . "\n";
}

$products[0]->setPrice(50.00);
$products[0]->setQuantity(30);

echo "\nUpdated information for product:\n";
echo $products[0]->getProduct() . "\n";


