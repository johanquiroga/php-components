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

    public function check($roles)
    {
        if (is_string($roles)) {
            $roles = explode('|', $roles);
        }

        return $this->auth->check() && in_array($this->auth->user()->role, $roles);
    }
}
