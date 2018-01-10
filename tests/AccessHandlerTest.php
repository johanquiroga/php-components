<?php

use Styde\AccessHandler as Access;

class AccessHandlerTest extends PHPUnit\Framework\TestCase
{
    public function test_grant_access()
    {
        $this->assertTrue(
            Access::check('admin')
        );
    }

    public function test_deny_access()
    {
        $this->assertFalse(
            Access::check('editor')
        );
    }
}