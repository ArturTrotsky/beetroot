<?php

function generateSignature($username, $time)
{
    $salt = '23fw43rfw432ds';
    return sha1($username . $time . $salt);
}

function encryptPass(string $password): string
{
    $salt = 'mn45bssed43tva33wed9';
    return sha1($password . $salt);
}
