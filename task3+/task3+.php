<!--даны две переменные, которые содержат стрики вида "FirstName MiddleName LastName" и "LastName FirstName"
(имя отчестои фамилия человека), написать скрипт который проверяет один это человек или нет,
при этом строки могут содержать лишние пробелы, цифры и другие знаки, значащими считаются только англ буквы
и один пробел между словами (регистр букв не играет роли)-->

<?php
$human1 = 'testa   Testb one two'; // FirstName MiddleName LastName
$human2 = 'testa testa testb testa';                                   // LastName FirstName
$convertedStr1 = strtolower(preg_replace('|[^A-z ]|', '', $human1));
$convertedStr2 = strtolower(preg_replace('|[^A-z ]|', '', $human2));
$fullName1Words = str_word_count($convertedStr1, 1);
$fullName2Words = str_word_count($convertedStr2, 1);

if ($fullName1Words === array_intersect($fullName1Words, $fullName2Words)
    || $fullName2Words === array_intersect($fullName2Words, $fullName1Words)) {
    echo 'Один и тот же человек';
} else {
    echo 'Разные люди';
}
