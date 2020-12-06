<?php

class Admin extends User
{
    protected const TYPE = 'admin';

    public function __construct(string $name, string $password, string $email, int $id = null)
    {
        parent::__construct($name, $password, $email, $id);
        $this->name = 'Admin' . $name;
    }

    public function register($db, $type = self::TYPE): int
    {
        return parent::register($db, self::TYPE);
    }

    public function block(User $user, object $db): void
    {
        // запрет блокировки админа
        /*if ($user::TYPE != User::TYPE) {
            return;
        }*/

        // запрет блокировки админа
        if ($user instanceof Admin) {
            return;
        }

        $stmt = $db->prepare("
            UPDATE `users`
            SET `status` = :status
            WHERE `id` = :id
        ");
        $stmt->execute(
            [
                'status' => 'not active',
                'id' => $user->id
            ]
        );
        $user->changeStatus('not active');
    }
}