<?php

use Rr64\App\Model\UserModel;
use Rr64\App\Shared\Handler\Cript;
use Rr64\App\Shared\Handler\Sanitize;

class RegisterController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserModel();
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {

            $username = $_POST['username'];
            $email = $_POST['mail'];
            $hash = Cript::hash($_POST['password']);

            $result = $this->userRepository->insertUser(Sanitize::Input($username), Sanitize::Input($email), $hash);

            echo $result;

            if ($result) {
                header('Location: /login');
            } else {
                header('Location: /register');
                $_POST = array();
                exit;
            }
        } else {
            include __DIR__ .  '/../views/register/register.php';
        }
    }
}
