<!--с пломошью curl получить курс валют с любого онлайн сайта
сохранять результаты в файл json, с меткой вренени когда были получены данные-->

<?php

$ch = curl_init();
$url = "https://tables.finance.ua/ru/currency/official/-/1";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

preg_match('#title="(([0-9\.]){10})"#', $result, $date);
preg_match_all('#{"(.{3})":(.[^}]{1,7})#', $result, $rates, PREG_SET_ORDER);

foreach ($rates as $key => $value) {
    $ratesArrForJson[$value[1]] = $value[2];
}

$filename = "data.json";
file_put_contents($filename, json_encode([$date[1], $ratesArrForJson]));