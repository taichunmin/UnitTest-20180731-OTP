<?php

namespace OTP;

class AuthenticationService
{
    private $profile;

    private $token;

    public function __construct(IProfile $profile, IToken $token, ILog $log)
    {
        $this->profile = $profile;
        $this->token = $token;
        $this->log = $log;
    }

    public function isValid(string $account, string $passCode) : bool
    {
        // 根據 account 取得自訂密碼
        $passwordFromDao = $this->profile->getPassword($account);

        // 根據 account 取得 RSA token 目前的亂數
        $randomCode = $this->token->getRandom($account);

        // 驗證傳入的 passCode 是否等於自訂密碼 + RSA token亂數
        $validPasscode = $passwordFromDao . $randomCode;

        if ($passCode == $validPasscode) {
            return true;
        }

        $this->log->save('Account: {$account} login failed.');

        return false;
    }
}

