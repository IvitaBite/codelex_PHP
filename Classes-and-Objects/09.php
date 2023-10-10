<?php

/*
Finish bank-account.php
class BankAccount
{

}

Add the following method:

function show_user_name_and_balance() { }
Your method should return a string that contains the account's name and balance separated by a comma and space. 
For example, if an account object named ben has the name "Benson" and a balance of 17.25, the call of 
ben.show_user_name_and_balance() should return:

Benson, $17.25
There are some special cases you should handle. If the balance is negative, put the - sign before the dollar sign. 
Also, always display the cents as a two-digit number. For example, if the same object had a balance of -17.5, 
your method should return:

Benson, $17.50
*/

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function setBalance(float $newBalance): void
    {
        $this->balance = $newBalance;
    }

    public function showUsernameAndBalance(): string
    {
        $formattedBalance = number_format(abs($this->getBalance()), 2);
        if ($this->getBalance() < 0) {
            return "{$this->getName()}, -$" . ($formattedBalance) . "\n";
        } else {
            return "{$this->getName()}, $" . $formattedBalance . "\n";
        }
    }
}

$newName = readline("Enter a new name for the account: ");
$newBalance = (float)readline("Enter a new balance for the account: ");
$accounts = new BankAccount($newName, $newBalance);
$accounts->setName($newName);
$accounts->setBalance($newBalance);
echo "\n" . $accounts->showUsernameAndBalance();

$accounts = [
    new BankAccount ("Benson", 17.25),
    new BankAccount ("Konors", 1096.56),
    new BankAccount ("Zane", 153.00),
    new BankAccount ("Roberts", -15.00),
];
foreach ($accounts as $account) {
    echo $account->showUsernameAndBalance();
}

