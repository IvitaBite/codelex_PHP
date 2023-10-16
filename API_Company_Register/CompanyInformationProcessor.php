<?php

class CompanyInformationProcessor
{
    private CompanySearch $companySearch;

    public function __construct(CompanySearch $companySearch)
    {
        $this->companySearch = $companySearch;
    }

    public function processUserInput(): void
    {
        $query = readline("Enter the company name or registration number: ");

        $companies = [];

        if (is_numeric($query)) {
            $companies = $this->companySearch->searchByRegistrationNumber($query);
        }
        $companies = $this->companySearch->searchByName($query);

        if (empty($companies)) {
            echo "No matching companies found. \n";
        }

        foreach ($companies as $companyData) {
            $company = new Company();
            $company->setName($companyData['name']);
            $company->setType($companyData['type_text']);
            $company->setRegistrationNumber($companyData['sepa']);
            $company->setRegistrationDate($companyData['registered']);
            $company->setAddress($companyData['address']);
            $company->setTerminated($companyData['terminated']);

            $this->displayCompanyInfo($company);
            echo "-----------------------------\n";
        }
    }

    public function displayCompanyInfo(Company $company): void
    {
        echo "Company Name: {$company->getName()}\n";
        echo "Type: {$company->getType()}\n";
        echo "Registration Number: {$company->getRegistrationNumber()}\n";
        echo "Registration Date: {$company->getRegistrationDate()}\n";
        echo "Address: {$company->getAddress()}\n";
        echo "Terminated: {$company->getTerminated()}\n";
    }

}

