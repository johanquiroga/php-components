<?php

use Styde\AccessHandler as Access;
use Styde\Authenticator as Auth;
use Styde\SessionManager as Session;
use Styde\SessionFileDriver;

class AccessHandlerTest extends PHPUnit\Framework\TestCase
{
    public function test_grant_access()
    {
        $driver = new SessionFileDriver();
        $session = new Session($driver);
        $auth = new Auth($session);
        $access = new Access($auth);

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $driver = new SessionFileDriver();
        $session = new Session($driver);
        $auth = new Auth($session);
        $access = new Access($auth);

        $this->assertFalse(
            $access->check('editor')
        );
    }
}