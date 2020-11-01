<!--Домашнее задание 5-6:
Создать простую форму регистрации пользователя на HTML, задать список переменных со значениями полей формы регистрации,
вывести в поля формы регистрации значения заданные в переменных.
Создать массив с несколькими языками пользователя сайта, на форму регистрации добавить элемент select
в который вывести возможные языки из массива.-->

<?php
$firstName = "Artur";
$email = "artur@artur";
$password = "qwerty";
$languages = ['ukr' => 'ukrainian', 'eng' => 'english', 'rus' => 'russian', 'pol' => 'polish'];
?>

<html>
<body>
<form action="" method="post">
    <p>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $firstName; ?>">
    </p>
    <p>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </p>
    <p>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
    </p>
    <p>
        <label>Confirm password</label>
        <input type="password" name="confirmPassword" value="<?php echo $password; ?>">
    </p>
    <p>
        <label>Select language</label>
        <select name="language">
            <option>Select language</option>
            <option value="<?php echo key($languages) ?>">
                <?php echo $languages['ukr']; ?></option>
            <option value="<?php next($languages);
            echo key($languages); ?>"><?php echo $languages['eng']; ?></option>
            <option value="<?php next($languages);
            echo key($languages); ?>"><?php echo $languages['rus']; ?></option>
            <option value="<?php next($languages);
            echo key($languages); ?>"><?php echo $languages['pol']; ?></option>
            <option selected value="language"><?php echo $languages['ukr']; ?></option>
        </select>
    </p>
    <input type="submit" value="Register">
</form>
</body>
</html>