<?php

namespace OTP;

interface IToken
{
    public function getRandom(string $account) : string;
}

class RsaTokenDao implements IToken
{
    public function getRandom(string $account) : string
    {
        return sprintf('%06d', mt_rand(0, 999999));
    }
}

