<?php

class CompanySearch
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9";
    }

    public function searchByName($name): array
    {
        $query = urlencode($name);
        $apiUrl = $this->apiUrl . "&q=" . $query;
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);
        return $data['result']['records'];
    }

    public function searchByRegistrationNumber($registrationNumber): array
    {
        $query = urlencode($registrationNumber);
        $apiUrl = $this->apiUrl . "&q=" . $query;
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);
        return $data['result']['records'];
    }

}
