<?php
declare(strict_types=1);
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php';

// https://stackoverflow.com/questions/11079135/how-to-post-json-data-with-php-curl
// Get all employee data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://dummy.restapiexample.com/api/v1/employees');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$employess = json_decode($output, true);
$id = $employess['data'][count($employess['data']) - 1]['id'];
echo '<pre>';
print_r($employess);
echo '</pre>';


// Get a single (last) employee data
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://dummy.restapiexample.com/api/v1/employee/' . $id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

echo '<pre>';
print_r(json_decode($output, true));
echo '</pre>';


// Create new record in database
$ch = curl_init();
$employee = ["name" => "test", "salary" => "123", "age" => "23"];
curl_setopt($ch, CURLOPT_URL, 'http://dummy.restapiexample.com/api/v1/create');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($employee));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

$output = curl_exec($ch);
curl_close($ch);

echo '<pre>';
print_r(json_decode($output, true));
echo '</pre>';