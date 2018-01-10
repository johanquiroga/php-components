<?php

use Styde\AccessHandler as Access;
use Styde\Stubs\AuthenticatorStub;

class AccessHandlerTest extends PHPUnit\Framework\TestCase
{
    public function test_grant_access()
    {
        $auth = new AuthenticatorStub();
        $access = new Access($auth);

        $this->assertTrue(
            $access->check('admin')
        );
    }

    public function test_deny_access()
    {
        $auth = new AuthenticatorStub();
        $access = new Access($auth);

        $this->assertFalse(
            $access->check('editor')
        );
    }

}