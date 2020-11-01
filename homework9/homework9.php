<!--Домашнее задание 9:
Используя массив юзеров с предыдущего урока и циклы, выполните следующие действия:
- выведите на экран имена пользователей, которые встречаются более одного раза и количество повторений имени;
- разделите пользователей на массивы по языку, каждый массив будет содержать пользователей с одинаковым языком;
- с помощью цикла сформируйте новый массив, содержащий пользователей в обратном порядке от исходного массива
(первый пользователь станет последним, второй — предпоследним и т.д.)-->

<?php
$users = [
    '5' => [
        'name' => 'Fifth', 'email' => 'fifth@test.com', 'lang' => 'en'
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
        'name' => 'Sixth', 'email' => 'seventh@test.com', 'lang' => 'ua'
    ],
    '43' => [
        'name' => 'Fourth', 'email' => 'fourth@test.com', 'lang' => 'en'
    ],
    '2' => [
        'name' => 'Fourth', 'email' => 'second@test.com', 'lang' => 'ua'
    ],
];


// выведите на экран имена пользователей, которые встречаются более одного раза и количество повторений имени;
foreach ($users as $user) {
    $userNames[] = $user['name'];
}

$countNames = array_count_values($userNames);

foreach ($countNames as $name => $count) {
    if ($count > 1) {
        echo 'Имя ' . $name . ' повторяется ' . $count . " раз(а)<br>";
    }
}


// разделите пользователей на массивы по языку, каждый массив будет содержать пользователей с одинаковым языком;
foreach ($users as $key => $user) {
    $languagesUsers[$user['lang']][] = $user;
}
var_dump($languagesUsers);


// с помощью цикла сформируйте новый массив, содержащий пользователей в обратном порядке от исходного массива
// (первый пользователь станет последним, второй — предпоследним и т.д.)
$keys = array_keys($users);
$reverseUsers = [];
for ($i = (count($keys) - 1); $i >= 0; $i--) {
    $reverseUsers[$keys[$i]] = $users[$keys[$i]];
}
echo '<pre>';
print_r($reverseUsers);
echo '</pre>';
