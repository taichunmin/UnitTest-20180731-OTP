<?php

namespace OTP;

interface ILog
{
    public function save(string $message) : void;
}

class LogDao implements ILog
{
    public function save(string $message) : void
    {
        return;
    }
}