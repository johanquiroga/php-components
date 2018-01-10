<?php

namespace Styde\Stubs;

use Styde\AuthenticatorInterface;
use Styde\User;

class AuthenticatorStub implements AuthenticatorInterface
{
    protected $logged;

    public function __construct($logged = true)
    {
        $this->logged = $logged;
    }

    public function user()
    {
        return new User([
            'role' => 'admin'
        ]);
    }

    /**
     * @return bool
     */
    public function check()
    {
        return $this->logged;
    }
}