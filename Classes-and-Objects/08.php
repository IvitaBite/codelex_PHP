<?php

/*
Design a SavingsAccount class that stores a savings account’s annual interest rate and balance.

The class constructor should accept the amount of the savings account’s starting balance.
The class should also have methods for:
    subtracting the amount of a withdrawal
adding the amount of a deposit
adding the amount of monthly interest to the balance
The monthly interest rate is the annual interest rate divided by twelve. To add the monthly interest to the balance,
    multiply the monthly interest rate by the balance, and add the result to the balance.

Test the class in a program that calculates the balance of a savings account at the end of a period of time.
It should ask the user for the annual interest rate, the starting balance, and the number of months that have passed
since the account was established. A loop should then iterate once for every month, performing the following:

Ask the user for the amount deposited into the account during the month. Use the class method to
    add this amount to the account balance. Ask the user for the amount withdrawn from the account during the month.
    Use the class method to subtract this amount from the account balance. Use the class method to calculate the
    monthly interest. After the last iteration, the program should display the ending balance, the total amount of
    deposits, the total amount of withdrawals, and the total interest earned.

Output should be similar to this:
How much money is in the account?: 10000
Enter the annual interest rate:5
How long has the account been opened? 4
    Enter amount deposited for month: 1: 100
Enter amount withdrawn for 1: 1000
Enter amount deposited for month: 2: 230
Enter amount withdrawn for 2: 103
Enter amount deposited for month: 3: 4050
Enter amount withdrawn for 3: 2334
Enter amount deposited for month: 4: 3450
Enter amount withdrawn for 4: 2340
Total deposited: $7,830.00
Total withdrawn: $5,777.00
Interest earned: $29,977.72
Ending balance: $42,030.72
*/

class SavingsAccount
{
    private float $balance;
    private float $interestRate;
    private const MONTHS_IN_YEAR = 12;

    public function __construct(float $balance, float $interestRate)
    {
        $this->balance = $balance;
        $this->interestRate = $interestRate;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }

    public function setDeposit(float $amount): void
    {
        if ($amount < 0) {
            $amount = (float)readline("Deposit amount must be positive. Please enter a positive amount: ");
        }
        $this->balance += $amount;
    }

    public function setWithdraw(float $amount): void
    {
        if ($amount <= 0) {
            $amount = (float)readline("Withdrawal amount must be positive. Please enter a positive amount: ");
        }
        if ($this->balance < $amount) {
            $amount = (float)readline("Insufficient balance for withdrawal. Please enter amount withdraw for month: ");
        }
        $this->balance -= $amount;
    }

    public function calcMonthlyInterest(): float
    {
        $monthlyInterest = $this->getBalance() * (($this->getInterestRate()) / SavingsAccount::MONTHS_IN_YEAR);
        $this->balance += $monthlyInterest;
        return $monthlyInterest;
    }
}

class UserInputHandler
{
    public static function getUserInput(string $prompt): float
    {
        echo $prompt;
        return (float)readline();
    }
}

class SavingAccountCalculator
{
    public static function calculate(SavingsAccount $account, int $months): void
    {
        $totalDeposits = 0;
        $totalWithdrawals = 0;
        $totalInterest = 0;

        for ($month = 1; $month <= $months; $month++) {
            $depositAmount = UserInputHandler::getUserInput("Enter amount deposited for month $month: ");
            $account->setDeposit($depositAmount);
            $totalDeposits += $depositAmount;

            $withdrawalAmount = UserInputHandler::getUserInput("Enter amount withdraw for month $month: ");
            $account->setWithdraw($withdrawalAmount);
            $totalWithdrawals += $withdrawalAmount;

            $monthlyInterest = $account->calcMonthlyInterest();
            $totalInterest += $monthlyInterest;

        }

        $endingBalance = $account->getBalance();
        self::displayAccountSummary($totalDeposits, $totalWithdrawals, $totalInterest, $endingBalance);
    }


    private static function displayAccountSummary(float $totalDeposits, float $totalWithdrawals,
                                                  float $totalInterest, float $endingBalance): void
    {
        echo "Total deposited: $" . number_format($totalDeposits, 2) . PHP_EOL;
        echo "Total withdrawn: $" . number_format($totalWithdrawals, 2) . PHP_EOL;
        echo "Interest earned: $" . number_format($totalInterest, 2) . PHP_EOL;
        echo "Ending balance: $" . number_format($endingBalance, 2) . PHP_EOL;
    }
}

$balance = (float)readline("How much money is in the account?: ");
$interestRate = (float)readline("Enter the annual interest rate: ");
$months = (int)readline("How long has the account been opened?:  ");

$savingsAccount = new SavingsAccount($balance, $interestRate);

SavingAccountCalculator::calculate($savingsAccount, $months);
