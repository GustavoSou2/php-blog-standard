<?php

namespace Rr64\App\Shared\Handler;

class Cript
{
    public static function hash($pass): string
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    public static function verify($pass, $hash): bool
    {
        return password_verify($pass, $hash);
    }
}
