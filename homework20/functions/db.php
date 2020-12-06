<?php

function getUser(object $connection, string $email, string $password)
{
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $connection->prepare("
        SELECT
            `email`,
            `password`
        FROM
            `users`
        WHERE
            `email` = :email
        AND
            `password` = :password

    ");

    $stmt->execute(['email' => $email, 'password' => $password]);
    return $stmt->fetch();
}