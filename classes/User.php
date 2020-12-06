<?php

class User
{
    public $id;
    public $name;
    private $password;
    public $email;
    private $salt = 'dsfb32ewd2qa';

    public function __construct(string $name, string $password, string $email, int $id = null)
    {
        if (!empty($id)) {
            $this->id = $id;
        }

        $this->name = $name;
        $this->email = $email;
        $this->setPassword($password);
    }

    public function setPassword(string $password)
    {
        $this->password = $this->encryptPass($password);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    private function encryptPass(string $password): string
    {
        return sha1($password . $this->salt);
    }

    public function changePassword(string $oldPassword, string $newPassword): bool
    {
        if ($this->encryptPass($oldPassword) === $this->password) {
            $this->password = $this->encryptPass($newPassword);
            return true;
        } else {
            return false;
        }
    }

    public function login(string $email, string $password): bool
    {
        if ($email === $this->email && ($this->encryptPass($password) === $this->$password)) {
            return true;
        }
        return false;
    }

    public function register($db): int
    {
        $stmt = $db->prepare("
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
                "name" => $this->name,
                "email" => $this->email,
                "password" => $this->password,
            ]
        );
        $this->id = $db->lastInsertId();
        return $this->id;
    }
}