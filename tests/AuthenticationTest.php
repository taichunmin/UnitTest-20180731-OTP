<?php

namespace Tests\OTP;

use PHPUnit\Framework\TestCase;
use OTP\AuthenticationService;
use OTP\IProfile;
use OTP\IToken;
use OTP\ILog;
use Mockery as m;

class AuthenticationServiceTest extends TestCase
{
    /** @test */
    public function test_it_can_valid()
    {
        $profile = m::mock(IProfile::class);
        $profile->shouldReceive('getPassword')->andReturn('abc');

        $token = m::mock(IToken::class);
        $token->shouldReceive('getRandom')->andReturn('123456');

        $log = m::mock(ILog::class);
        $log->shouldReceive('save')->times(0);

        $auth = new AuthenticationService($profile, $token, $log);

        $this->assertTrue($auth->isValid('Kim', 'abc123456'));
    }

    /** @test */
    public function test_it_not_valid()
    {
        $profile = m::mock(IProfile::class);
        $profile->shouldReceive('getPassword')->andReturn('abc');

        $token = m::mock(IToken::class);
        $token->shouldReceive('getRandom')->andReturn('123456');

        $log = m::mock(ILog::class);
        $log->shouldReceive('save')->times(1);

        $auth = new AuthenticationService($profile, $token, $log);

        $this->assertFalse($auth->isValid('Kim', '123456abc'));
    }
}
