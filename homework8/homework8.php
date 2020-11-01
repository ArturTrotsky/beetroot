<!--Домашнее задание 8:
Добавить в массив пользователей с предыдущего задания новый параметр lang c возможными значениями
ru, en, ua, fr, de. С помощью условий проверить, что если первый и последний пользователь имеют одинаковый язык,
вывести приветсвие на экран на этом языке, если пользователи имеют разные языки, то вывести два приветствия
на соотвествующих языках.-->

<?php
$users = [
    '5' => [
        'name' => 'Fifth', 'email' => 'fifth@test.com', 'lang' => 'ru'
    ],
    '1' => [
        'name' => 'First', 'email' => 'first@test.com', 'lang' => 'fr'
    ],
    '3' => [
        'name' => 'Third', 'email' => 'third@test.com', 'lang' => 'ua'
    ],
    '6' => [
        'name' => 'Sixth', 'email' => 'sixth@test.com', 'lang' => 'de'
    ],
    '7' => [
        'name' => 'Seventh', 'email' => 'seventh@test.com', 'lang' => 'ua'
    ],
    '4' => [
        'name' => 'Fourth', 'email' => 'fourth@test.com', 'lang' => 'en'
    ],
    '2' => [
        'name' => 'Second', 'email' => 'second@test.com', 'lang' => 'ua'
    ],
];

$phrases = ['en' => 'Hello', 'fr' => 'Bonjour', 'de' => 'Hallo', 'ua' => 'Привіт', 'ru' => 'Привет'];

$arrUserIds = array_keys($users);
asort($arrUserIds);
$minUserId = current($arrUserIds);
$maxUserId = end($arrUserIds);

if ($users[$minUserId]['lang'] == $users[$maxUserId]['lang']) {
    echo $phrases[$users[$minUserId]['lang']];
} else echo $phrases[$users[$minUserId]['lang']] . ' - ' . $phrases[$users[$maxUserId]['lang']];
