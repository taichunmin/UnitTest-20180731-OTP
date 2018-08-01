<?php

namespace OTP;

interface IProfile
{
    public function getPassword(string $account) : string;
}

class ProfileDao implements IProfile
{
    public function getPassword(string $account) : string
    {
        return Context::getPassword($account);
    }
}

