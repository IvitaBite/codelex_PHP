<?php
/*
The object of the class Account represents a bank account that has a balance (meaning some amount of money).
The accounts are used as follows:

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state";
echo $bartos_account;
echo $bartos_swiss_account;

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->balance();
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance();

echo "Final state";
echo $bartos_account;
echo $bartos_swiss_account;
Your first account
Create a program that creates an account with the balance of 100.0, deposits 20.0 and prints the account.

Note! do all the steps described in the exercise exactly in the described order!

Your first money transfer
Create a program that:

Creates an account named "Matt's account" with the balance of 1000
Creates an account named "My account" with the balance of 0
Withdraws 100.0 from Matt's account
Deposits 100.0 to My account
Prints both accounts
Money transfers
In the above program, you made a money transfer from one person to another. Let us next create a method that does the same!

Create the method:

function transfer(Account $from, Account $to, int $howMuch) { }
The method transfers money from one account to another. You do not need to check that the from account has enough balance.

After completing the above, make sure that your main method does the following:

Creates an account "A" with the balance of 100.0
Creates an account "B" with the balance of 0.0
Creates an account "C" with the balance of 0.0
Transfers 50.0 from account A to account B
Transfers 25.0 from account B to account C
*/

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit(float $amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdrawal(float $amount)
    {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
        }
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return "$this->name: $" . number_format($this->balance, 2) . PHP_EOL;
    }

    public static function transfer(Account $from, Account $to, float $howMuch)
    {
        if ($howMuch > 0 && $from->balance >= $howMuch) {
            $from->withdrawal($howMuch);
            $to->deposit($howMuch);
        }
    }
}

class Bank
{
    private string $name;
    private array $accounts = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addAccount(Account $account)
    {
        $this->accounts[] = $account;
    }

    public function findAccountByName(string $name): ?Account
    {
        foreach ($this->accounts as $account) {
            if ($account->getName() === $name) {
                return $account;
            }
        }
        return null;
    }

    public function listAllAccounts()
    {
        echo "Accounts in {$this->name}:\n";
        foreach ($this->accounts as $account) {
            echo $account;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}

// Create multiple banks
$bankOne = new Bank("SEB");
$bankTwo = new Bank("Swedbank");

// Create and add accounts to Bank One - SEB
$accountA1 = new Account("Barto", 100.00);
$accountA2 = new Account("Konors", 20.00);

$bankOne->addAccount($accountA1);
$bankOne->addAccount($accountA2);

// Create and add accounts to Bank Two - Swedbank
$accountB1 = new Account("Anna", 200.00);
$accountB2 = new Account("Eva", 50.00);

$bankTwo->addAccount($accountB1);
$bankTwo->addAccount($accountB2);

echo "Available Banks:\n";
echo "1. {$bankOne->getName()}\n";
echo "2. {$bankTwo->getName()}\n";

$fromBankChoice = (int)readline("Choose the source bank (1 or 2): ");
$toBankChoice = (int)readline("Choose the destination bank (1 or 2): ");
echo "\n";

$fromBank = ($fromBankChoice === 1) ? $bankOne : $bankTwo;
$toBank = ($toBankChoice === 1) ? $bankOne : $bankTwo;


echo $fromBank->listAllAccounts() . "\n";
echo $toBank->listAllAccounts() . "\n";

$fromAccountName = readline("\nEnter the name of the account to transfer from: ");
$toAccountName = readline("Enter the name of the account to transfer to: ");
$amountToTransfer = (float)readline("Enter the amount to transfer: ");

$fromAccount = $fromBank->findAccountByName($fromAccountName);
$toAccount = $toBank->findAccountByName($toAccountName);

if ($fromAccount !== null && $toAccount !== null) {
    Account::transfer($fromAccount, $toAccount, $amountToTransfer);
    echo "Transfer successful.\n\n";
} else {
    echo "Invalid account names or insufficient balance. Transfer failed.\n\n";
}

echo "Updated Accounts in {$fromBank->getName()}:\n";
$fromBank->listAllAccounts();
echo "\n";
echo "Updated Accounts in {$toBank->getName()}:\n";
$toBank->listAllAccounts();


