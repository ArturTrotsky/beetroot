<?php
// http://old.code.mu/tasks/php/base/rabota-s-funkciyami-dlya-massivov-v-php.html

// 1.  Дан массив $arr. Подсчитайте количество элементов этого массива.
$arr = [2, 5, 7, 1, 9, 2, 4, 8, 3];
$numberOfElements = count($arr);
echo $numberOfElements . '</br>';

// 2. Дан массив $arr. С помощью функции count выведите последний элемент данного массива.
$lastElement = $arr[$numberOfElements - 1];
echo $lastElement . '</br>';

// 3. Дан массив с числами. Проверьте, что в нем есть элемент со значением 3.
echo in_array(3, $arr) . '</br>';

// 4. Найдите сумму элементов данного массива.
echo array_sum($arr) . '</br>';

// 5. Найдите произведение (умножение) элементов данного массива.
echo array_product($arr) . '</br>';

// 6. С помощью функций array_sum и count найдите среднее арифметическое элементов
echo array_sum($arr) / count($arr) . '</br>';

// 7. Создайте массив, заполненный числами от 1 до 100.
$arr = range(1, 100);
var_dump($arr);
echo '</br>';

// 8. Создайте массив, заполненный буквами от 'a' до 'z'.
$arr = range('a', 'z');
var_dump($arr);
echo '</br>';

// 9. Создайте строку '1-2-3-4-5-6-7-8-9' не используя цикл.
$arr = range(1, 9);
echo implode('-', $arr) . '</br>';

// 10. Найдите сумму чисел от 1 до 100 не используя цикл.
echo array_sum(range(1, 100)) . '</br>';

// 11. Найдите произведение чисел от 1 до 10 не используя цикл.
echo array_product(range(1, 10)) . '</br>';

// 12.  Даны два массива: первый с элементами 1, 2, 3, второй с элементами 'a', 'b', 'c'.
// Сделайте из них массив с элементами 1, 2, 3, 'a', 'b', 'c'.
$arr1 = [1, 2, 3];
$arr2 = ['a', 'b', 'c'];
$arr = array_merge($arr1, $arr2);
print_r($arr);
echo '</br>';

// 13. Дан массив с элементами 1, 2, 3, 4, 5.
// С помощью функции array_slice создайте из него массив $result с элементами 2, 3, 4.
$arr = [1, 2, 3, 4, 5];
$result = array_slice($arr, 1, 3);
print_r($result);
echo '</br>';

// 14. Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice преобразуйте массив в [1, 4, 5].
array_splice($arr, 1, 2);
print_r($arr);
echo '</br>';

// 15. Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice запишите в новый массив элементы [2, 3, 4].
$arr = [1, 2, 3, 4, 5];
$result = array_splice($arr, 1, 3);
print_r($result);
echo '</br>';

// 16. Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice сделайте из него массив [1, 2, 3, 'a', 'b', 'c', 4, 5].
$arr = [1, 2, 3, 4, 5];
array_splice($arr, 3, null, ['a', 'b', 'c']);
print_r($arr);
echo '</br>';

// 17. Дан массив [1, 2, 3, 4, 5].
// С помощью функции array_splice сделайте из него массив [1, 'a', 'b', 2, 3, 4, 'c', 5, 'e'].
$arr = [1, 2, 3, 4, 5];
array_splice($arr, 1, null, ['a', 'b']);
array_splice($arr, 6, null, ['c']);
array_splice($arr, 8, null, ['e']);
print_r($arr);
echo '</br>';

// 18. Дан массив 'a'=>1, 'b'=>2, 'c'=>3'. Запишите в массив $keys ключи из этого массива, а в $values – значения.
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
$keys = array_keys($arr);
$values = array_values($arr);
print_r($keys);
echo '</br>';
print_r($values);
echo '</br>';

// 19. Даны два массива: ['a', 'b', 'c'] и [1, 2, 3]. Создайте с их помощью массив 'a'=>1, 'b'=>2, 'c'=>3'.
$arr1 = ['a', 'b', 'c'];
$arr2 = [1, 2, 3];
$arr = array_combine($arr1, $arr2);
print_r($arr);
echo '</br>';

// 20. Дан массив 'a'=>1, 'b'=>2, 'c'=>3. Поменяйте в нем местами ключи и значения.
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
$result = array_flip($arr);
print_r($result);
echo '</br>';

// 21. Дан массив с элементами 1, 2, 3, 4, 5. Сделайте из него массив с элементами 5, 4, 3, 2, 1.
$arr = [1, 2, 3, 4, 5];
$result = array_reverse($arr);
print_r($result);
echo '</br>';

// 22. Дан массив ['a', '-', 'b', '-', 'c', '-', 'd']. Найдите позицию первого элемента '-'.
$arr = ['a', '-', 'b', '-', 'c', '-', 'd'];
print_r(array_search('-', $arr));
echo '</br>';

// 23. Дан массив ['a', '-', 'b', '-', 'c', '-', 'd'].
// Найдите позицию первого элемента '-' и удалите его с помощью функции array_splice.
$pos = array_search('-', $arr);
array_splice($arr, $pos, 1);
print_r($arr);
echo '</br>';

// 24. Дан массив ['a', 'b', 'c', 'd', 'e']. Поменяйте элемент с ключом 0 на '!', а элемент с ключом 3 - на '!!'.
$arr = ['a', 'b', 'c', 'd', 'e'];
$replacement = [0 => '!', 3 => '!!'];
$result = array_replace($arr, $replacement);
print_r($result);
echo '</br>';

// 25. Дан массив '3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'. Попробуйте на нем различные типы сортировок.
$arr = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];
print_r($arr);
echo '</br>';
ksort($arr);
print_r($arr);
echo '</br>';
sort($arr);
print_r($arr);
echo '</br>';

// 26. Дан массив с элементами 'a'=>1, 'b'=>2, 'c'=>3. Выведите на экран случайный ключ из данного массива.
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
print_r(array_rand($arr));
echo '</br>';

// 27. Дан массив с элементами 'a'=>1, 'b'=>2, 'c'=>3. Выведите на экран случайный элемент данного массива.
print_r($arr[array_rand($arr)]);
echo '</br>';

// 28. Дан массив $arr. Перемешайте его элементы в случайном порядке.
shuffle($arr);
print_r($arr);
echo '</br>';

// 29. Заполните массив числами от 1 до 25 с помощью range, а затем перемешайте его элементы в случайном порядке.
$arr = range(1, 25);
shuffle($arr);
print_r($arr);
echo '</br>';

// 30. Создайте массив, заполненный буквами от 'a' до 'z' так, чтобы буквы шли в случайном порядке и не повторялись.
$arr = range('a', 'z');
shuffle($arr);
print_r($arr);
echo '</br>';

// 31.  Сделайте строку длиной 6 символов, состоящую из маленьких английских букв, расположенных в случайном порядке.
// Буквы не должны повторяться.
$arr = range('a', 'f');
$str = implode(' ', $arr);
print_r($str);
echo '</br>';

// 32. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Удалите из него повторяющиеся элементы.
$arr = ['a', 'b', 'c', 'b', 'a'];
print_r(array_unique($arr));
echo '</br>';

// 33. Дан массив с элементами 1, 2, 3, 4, 5.  array_shift, array_pop, array_unshift, array_push.
// Выведите на экран его первый и последний элемент, причем так, чтобы в исходном массиве они исчезли.
$arr = [1, 2, 3, 4, 5];
$firstItem = array_shift($arr);
$lastItem = array_pop($arr);
echo $firstItem . '; ' . $lastItem . '</br>';

// 34. Дан массив с элементами 1, 2, 3, 4, 5. Добавьте ему в начало элемент 0, а в конец - элемент 6.
$arr = [1, 2, 3, 4, 5];
array_unshift($arr, 0);
array_push($arr, 6);
print_r($arr);
echo '</br>';

// 35. Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8.
// С помощью цикла и функций array_shift и array_pop выведите на экран его элементы в следующем порядке: 18273645.
$arr = [1, 2, 3, 4, 5, 6, 7, 8];
while (count($arr) >= 1) {
    $itemShift = array_shift($arr);
    $itemPop = array_pop($arr);
    echo $itemShift . $itemPop;
}
echo '</br>';

// 36. Дан массив с элементами 'a', 'b', 'c'. Сделайте из него массив с элементами 'a', 'b', 'c', '-', '-', '-'.
// array_pad, array_fill, array_fill_keys, array_chunk.
$arr = ['a', 'b', 'c'];
$result = array_pad($arr, 6, '-');
print_r($result);
echo '</br>';

// 37. Заполните массив 10-ю буквами 'x'.
$arr = array_fill(0, 10, 'x');
print_r($arr);
echo '</br>';

// 38. Создайте массив, заполненный целыми числами от 1 до 20.
// С помощью функции array_chunk разбейте этот массив на 5 подмассивов ([1, 2, 3, 4]; [5, 6, 7, 8] и т.д.).
$arr = range(1, 20);
echo '<pre>';
print_r(array_chunk($arr, 5));
echo '</pre>';

// 39. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Подсчитайте сколько раз встречается каждая из букв.
$arr = ['a', 'b', 'c', 'b', 'a'];
print_r(array_count_values($arr));
echo '</br>';

// 40. Дан массив с элементами 1, 2, 3, 4, 5.
// Создайте новый массив, в котором будут лежать квадратные корни данных элементов.
$arr = [1, 2, 3, 4, 5];
function square($n)
{
    return sqrt($n);
}

$result = array_map('square', $arr);
print_r($result);
echo '</br>';


// 41. Дан массив с элементами '<b>php</b>', '<i>html</i>'.
// Создайте новый массив, в котором из элементов будут удалены теги.
$arr = ['<b>php</b>', '<i>html</i>'];
function deleteTag($n)
{
    return strip_tags($n);
}

$result = array_map('deleteTag', $arr);
print_r($result);
echo '</br>';


// 42. Дан массив с элементами ' a ', ' b ', ' с '.
// Создайте новый массив, в котором будут данные элементы без концевых пробелов.
$arr = [' a ', ' b ', ' с '];
function deleteSpace($n)
{
    return trim($n);
}

$result = array_map('deleteSpace', $arr);
print_r($result);
echo '</br>';

// 43. Дан массив с элементами 1, 2, 3, 4, 5 и массив с элементами 3, 4, 5, 6, 7.
// Запишите в новый массив элементы, которые есть и в том, и в другом массиве. array_intersect, array_diff.
$arr1 = [1, 2, 3, 4, 5];
$arr2 = [3, 4, 5, 6, 7];
$result = array_intersect($arr1, $arr2);
print_r($result);
echo '</br>';

// 44.  Дан массив с элементами 1, 2, 3, 4, 5 и массив с элементами 3, 4, 5, 6, 7.
// Запишите в новый массив элементы, которые не присутствуют в обоих массивах одновременно.
$result = array_diff($arr1, $arr2) + array_diff($arr2, $arr1);
print_r($result);
echo '</br>';

// 45. Дана строка '1234567890'. Найдите сумму цифр из этой строки не используя цикл.
$str = '1234567890';
$arr = str_split($str);
$result = array_sum($arr);
print_r($result);
echo '</br>';

// 46. Создайте массив ['a'=>1, 'b'=2... 'z'=>26] не используя цикл.
$keys = range('a', 'z');
$values = range(1, 26);
$arr = array_combine($keys, $values);
print_r($arr);
echo '</br>';

// 47. Создайте массив вида [[1, 2, 3], [4, 5, 6], [7, 8, 9]] не используя цикл.
$arr = range(1, 9);
$arr = array_chunk($arr, 3);
echo '<pre>';
print_r($arr);
echo '</pre>';

// 48. Дан массив с элементами 1, 2, 4, 5, 5. Найдите второй по величине элемент. В нашем случае это будет 4.
$arr = [1, 2, 4, 5, 5];
sort($arr);
$count = count($arr);
for ($i = $count - 1; $i >= 1; $i--) {
    if ($arr[$i] > $arr[$i - 1]) {
        $secondBiggestElement = $arr[$i - 1];
        echo 'Второй по величине элемент: ' . $secondBiggestElement;
        break;
    }
}
if (empty($secondBiggestElement)) echo 'Второй по величине элемент отсутствует';