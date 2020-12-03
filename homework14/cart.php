<?php
session_start();

if (!empty($_POST['checkbox'])) {
    $_SESSION['cart']['checkbox'] = $_POST['checkbox'];
}
if (!empty($_POST['quantity'])) {
    $_SESSION['cart']['quantity'] = $_POST['quantity'];
}

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
