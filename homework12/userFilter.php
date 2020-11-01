<?php

require_once "userExplode.php";

if (isset($users)) {
    foreach ($users as $user) {
        if (strlen($user[2]) < 8) {
            $userFiltered[] = $user;
        }
    }
}
