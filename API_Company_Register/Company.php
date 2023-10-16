<?php

class Company
{
    private string $name;
    private string $type;
    private string $registrationNumber;
    private string $registrationDate;
    private string $address;
    private ?string $terminated;

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function getRegistrationDate(): string
    {
        if ($this->registrationDate === null) {
            return 'N/A';
        }
        return date("d/m/Y", strtotime($this->registrationDate));
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getTerminated(): ?string
    {
        if ($this->terminated === null) {
            return 'N/A';
        }
        return date("d/m/Y", strtotime($this->terminated));
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setRegistrationNumber(string $registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function setRegistrationDate(string $registrationDate)
    {
        $this->registrationDate = $registrationDate;
    }

    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    public function setTerminated(?string $terminated)
    {
        $this->terminated = $terminated;
    }
}