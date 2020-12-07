<?php

function getUser(object $connection, string $email, string $password)
{
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $connection->prepare("
        SELECT
            `name`,
            `email`,
            `password`
        FROM
            `users`
        WHERE
            `email` = :email
        AND
            `password` = :password

    ");

    $stmt->execute(['email' => $email, 'password' => encryptPass($password)]);
    return $stmt->fetch();
}

function registerUser(object $connection, string $name, string $email, string $password): int
{
    $stmt = $connection->prepare("
        INSERT INTO `users` (
            `name`,
            `email`,
            `password`
        )
        VALUES
            (
                :name,
                :email,
                :password
            )"
    );

    $stmt->execute(
        [
            'name' => $name,
            'email' => $email,
            'password' => encryptPass($password)
        ]
    );

    return $connection->lastInsertId();
}