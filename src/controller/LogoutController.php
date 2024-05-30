<?php

class LogoutController
{
    public function index()
    {
        setcookie("session_token", "", time() - 86400, "/");
        setcookie("user", "", time() - 86400, "/");
        session_destroy();
        header('Location: /login');
        exit;
    }
}