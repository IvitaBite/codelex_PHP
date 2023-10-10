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

    public function deposit(float $amount): void
    {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Deposited $" . number_format($amount, 2) . " into {$this->name}'s account.\n";
        } else {
            echo "Invalid deposit amount.\n";
        }
    }

    public function withdraw(float $amount): bool
    {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
            echo "Withdrawn $" . number_format($amount, 2) . " from {$this->getName()}'s account.\n";
            return true;
        } elseif ($amount > 0) {
            echo "Insufficient funds to withdraw $" . number_format($amount, 2) . " from {$this->getName()}'s account.\n";
        } else {
            echo "Invalid withdrawal amount.\n";
        }
        return false;
    }
}

class Bank
{
    private array $accounts = [];

    public function addAccount(BankAccount $account): void
    {
        $this->accounts[] = $account;
    }

    public function getAccounts(): array
    {
        return $this->accounts;
    }

    public function findAccountByName(string $name): ?BankAccount
    {
        foreach ($this->accounts as $account) {
            if ($account->getName() === $name) {
                return $account;
            }
        }
        return null;
    }

    public function listAllAccounts(): void
    {
        echo "Accounts in the bank:\n";
        foreach ($this->accounts as $account) {
            echo $account->showUsernameAndBalance();
        }
    }
}

$bank = new Bank();
$bank->addAccount(new BankAccount ("Benson", 17.25));
$bank->addAccount(new BankAccount ("Konors", 1096.56));
$bank->addAccount(new BankAccount ("Zane", 153.00));
$bank->addAccount(new BankAccount ("Roberts", -15.00));

$bank->listAllAccounts();
echo "\n";

$accountName = readline("Enter the account name to search for: ");
$account = $bank->findAccountByName($accountName);
if ($account !== null) {
    $depositAmount = (float)readline("Enter the deposit amount: ");
    $account->deposit($depositAmount);

    $withdrawAmount = (float)readline("Enter the withdrawal amount: ");
    $account->withdraw($withdrawAmount);
    echo "Total Bank Balance: " . $account->showUsernameAndBalance() . "\n\n";
} else {
    echo "Account not found.\n\n";
}

