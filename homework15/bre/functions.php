<?php

function generateSignature($username, $time)
{
    $salt = '23fw43rfw432ds';
    return sha1($username . $time . $salt);
}