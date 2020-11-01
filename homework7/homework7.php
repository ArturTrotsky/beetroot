<!--Домашнее задание 7:
Создать массив пользователей из 5-7 пользователей сайта вида
$users = [];
$users["5"] = ["name" => "Test", "email" => "test@test.com"];
$users["3"] = ["name" => "Anton", "email" => "anton@gmail.com"];
где "5" — id пользователя сайта, с помощью функций работы с масивами вывести общее количество пользователей сайта,
отсортировать пользователей в порядке убывания id, получить пользователя с максимальным и минимальным айди,
получить пользователя с айди следующим за минимальным и предыдущим максимальному айди,
удалить из массива пользователя с минимальным айди.-->

<?php
$users = [
    '5' => [
        'name' => 'Fifth', 'email' => 'fifth@test.com'
    ],
    '1' => [
        'name' => 'First', 'email' => 'first@test.com'
    ],
    '3' => [
        'name' => 'Third', 'email' => 'third@test.com'
    ],
    '6' => [
        'name' => 'Sixth', 'email' => 'sixth@test.com'
    ],
    '7' => [
        'name' => 'Seventh', 'email' => 'seventh@test.com'
    ],
    '4' => [
        'name' => 'Fourth', 'email' => 'fourth@test.com'
    ],
    '2' => [
        'name' => 'Second', 'email' => 'second@test.com'
    ],
];

/*_____________________________________________________________________________________*/

// Вывести общее количество пользователей сайта
$numberOfUsers = count($users);
echo 'Общее количество пользователей сайта: ' . $numberOfUsers . '</br>';

/*_____________________________________________________________________________________*/

// Отсортировать пользователей в порядке убывания id
krsort($users);
echo '<pre>';
print_r($users);
echo '</pre>';


/*_____________________________________________________________________________________*/

// Получить пользователя с максимальным и минимальным айди
// с айди следующим за минимальным и предыдущим максимальному айди
// ВАРИАНТ2 ЕСЛИ МАССИВ ПОЛЬЗОВАТЕЛЕЙ   НЕ    ОТСОРТИРОВАН и сортировать его нельзя

$arrUserIds = array_keys($users);
asort($arrUserIds);
$minUserId = current($arrUserIds);
$afterMinUserId = next($arrUserIds);
$maxUserId = end($arrUserIds);
$prevMaxUserId = prev($arrUserIds);

echo 'Пользователь с максимальным айди';
echo '<pre>';
print_r($users[$maxUserId]);
echo '</pre>';
echo '</br>';

echo 'Пользователь с минимальным айди';
echo '<pre>';
print_r($users[$minUserId]);
echo '</pre>';
echo '</br>';

echo 'Пользователь с айди следующим за минимальным';
echo '<pre>';
print_r($users[$afterMinUserId]);
echo '</pre>';
echo '</br>';

echo 'Пользователь c предыдущим максимальному айди';
echo '<pre>';
print_r($users[$prevMaxUserId]);
echo '</pre>';
echo '</br>';


/*_____________________________________________________________________________________*/

// удалить из массива пользователя с минимальным айди
unset($users[$minUserId]);

echo '<pre>';
print_r($users);
echo '</pre>';
