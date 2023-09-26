<?php


// API URL
$apiUrl = 'https://rickandmortyapi.com/api/episode';

// HTTP pieprasījums API un saņemt JSON??
$jsonResponse = file_get_contents($apiUrl);

// Pārbaudīt vai HTTP pieprasījums bija veiksmīgs
if ($jsonResponse !== false) {
    // Parse the JSON data ???? lasīt papildus
    $data = json_decode($jsonResponse, true);

    // pārbaudīt vai ir veiksmīgi "parsed" dati - papildu info
    if ($data !== null && isset($data['results'])) {
        // epizožu nosaukum masīvā salikt
        $episodeNames = array_map(function ($episode) {
            return $episode['name'];
        }, $data['results']);

        // izdrukāt epizožu nosaukumju no masīva
        print_r($episodeNames);
    } else {
        //ja gadījumā nav veiksmīgi
        echo "Failed to parse JSON data from the API.";
    }
} else {
    echo "Failed to retrieve data from the API.";
}



