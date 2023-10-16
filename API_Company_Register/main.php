<?php
declare(strict_types=1);

require_once 'Company.php';
require_once "CompanySearch.php";
require_once "CompanyInformationProcessor.php";

$companySearch = new CompanySearch();
$companyInformationProcessor = new CompanyInformationProcessor($companySearch);
$companyInformationProcessor->processUserInput();
