<?php

use Rr64\App\Model\UserModel;
use Rr64\App\Shared\Handler\Cript;
use Rr64\App\Shared\Handler\Sanitize;
use Rr64\App\Shared\Handler\Token;

class LoginController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserModel();
    }


    public function index()
    {
        if (Token::hasToken() && isset($_COOKIE['keep_me_logged']) && $_COOKIE['user']) {
            header('Location: /home');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mail'])) {

            $email = $_POST['mail'];

            $user = $this->userRepository->logIn(Sanitize::Input($email));

            if (!!$user) {
                $passIsRight = Cript::verify($_POST['password'], $user['password']);

                if (!!$passIsRight) {
                    $session_token = session_id();

                    setcookie('user', serialize($user), time() + 86400, '/');
                    setcookie('session_token', $session_token, time() + 86400, '/');
                    setcookie('keep_me_logged', isset($_POST['keep_me_logged']), 2147483647, '/');

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['mail'] = $user['email'];

                    header('Location: /home');
                    $_POST = array();
                } else {
                    header('Location: /login');
                    $_POST = array();
                    exit;
                }
            }
        } else {
            include __DIR__ .  '/../views/login/login.php';
        }
    }


  
}
