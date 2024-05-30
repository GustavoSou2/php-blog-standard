<?php

namespace Rr64\App\Shared\Handler;

class Sanitize
{
    public static function Input($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}
