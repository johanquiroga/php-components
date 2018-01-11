<?php

namespace Styde;

class AccessHandler
{
    /**
     * @var \Styde\Authenticator
     */
    protected $auth;

    /**
     * @param \Styde\Authenticator $auth
     */
    public function __construct(Authenticator $auth)
    {
        $this->auth = $auth;
    }

    public function check($role)
    {
        return $this->auth->check() && $this->auth->user()->role === $role;
    }
}