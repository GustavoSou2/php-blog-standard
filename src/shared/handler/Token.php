<?php

namespace Rr64\App\Shared\Handler;

class Token
{
    public static function hasToken(): bool
    {
        return isset($_COOKIE['session_token']);
    }

}
