<?php

namespace OTP;

class Context
{
    private static $profiles = [
        'Kim' => 'abc', 
        'Tom' => 'def'
    ];

    public static function getPassword(string $account) : string
    {
        return self::$profiles[$account];
    }
}

