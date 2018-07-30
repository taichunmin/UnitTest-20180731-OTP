<?php

namespace Tests\OTP;

use PHPUnit\Framework\TestCase;
use OTP\AuthenticationService;

class AuthenticationServiceTest extends TestCase
{
    /** @test */
    public function test_it_can_valid()
    {
        $auth = new AuthenticationService;

        $this->assertTrue($auth->isValid('Kim', 'abc123456'));
    }
}
