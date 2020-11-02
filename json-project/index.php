<?php
require 'vendor/autoload.php';

use GuzzleHttp\Promise;
use GuzzleHttp\Client as HttpClient;

$client = new HttpClient([ 'base_uri' => 'https://api.exchangeratesapi.io' ]);

$latestData = [];
$latestDataUsd = [];

$promises = [
    'latest' => $client->getAsync('/latest')->then(
        function($response) use(&$latestData) {
            $latestData = json_decode($response->getBody(), true);
        })->then(function ($error) {
            echo $error;
        })
    ,
    'latestDollar' => $client->getAsync('/latest?base=USD')->then(
        function($response) use(&$latestDataUsd) {
            $latestDataUsd = json_decode($response->getBody(), true);
        })->then(function ($error) {
            echo $error;
        })
];

$responses = Promise\settle($promises)->wait();

/**
 * @param array $data
 * @param string $currency
 * @return string
 */
function displayData(array $data, string $currency = 'EUR') {
    if(count($data) < 1) {
        echo "<p>There is no data to display ($currency)</p>";
        return;
    }
    $base = $data['base'];
    $date = $data['date'];
    $rows = "<h1>Latest $base</h1>";
    foreach($data['rates'] as $currency => $rate) {
        $rows .= "<br> Currency: $currency <br> Rate: $rate <br> Base: $base <br> Date: $date <hr>";
    }
    return $rows;
}

echo displayData($latestData).displayData($latestDataUsd, 'USD');