<?php

namespace OTP;

class AuthenticationService
{
    public function isValid(string $account, string $passCode) : bool
    {
        // 根據 account 取得自訂密碼
        $profileDao = new ProfileDao;
        $passwordFromDao = $profileDao->getPassword($account);

        // 根據 account 取得 RSA token 目前的亂數
        $rsaToken = new RsaTokenDao;
        $randomCode = $rsaToken->getRandom($account);

        // 驗證傳入的 passCode 是否等於自訂密碼 + RSA token亂數
        $validPasscode = $passwordFromDao . $randomCode;

        if ($passCode == $validPasscode) {
            return true;
        }

        return false;
    }
}

