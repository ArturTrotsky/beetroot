!--даны две переменные, которые содержат стрики вида "FirstName MiddleName LastName" и "LastName FirstName"
(имя отчестои фамилия человека), написать скрипт который проверяет один это человек или нет,
при этом строки могут содержать лишние пробелы, цифры и другие знаки, значащими считаются только англ буквы
и один пробел между словами (регистр букв не играет роли)-->

<?php
$human2 = 'Beetrootovna     n4шШш44ATALyA      nъщлE....borA3K  '; // FirstName MiddleName LastName
$human1 = 'Ne6Bor66ak   Na75talya ';                                   // LastName FirstName

$convertedStr1 = strtolower(preg_replace('|[^A-z ]|', '', $human1));
$convertedStr2 = strtolower(preg_replace('|[^A-z ]|', '', $human2));

$filteredHumanArray1 = array_filter(explode(' ', $convertedStr1));
$filteredHumanArray2 = array_filter(explode(' ', $convertedStr2));

if (count($filteredHumanArray1) > count($filteredHumanArray2)) {
    $searchResult = array_diff($filteredHumanArray2, $filteredHumanArray1);
} else {
    $searchResult = array_diff($filteredHumanArray1, $filteredHumanArray2);
}

if (!$searchResult) {
    echo 'Один и тот же человек';
} else {
    echo 'Разные люди';
}