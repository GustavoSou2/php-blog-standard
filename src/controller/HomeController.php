<?php

use Rr64\App\Model\NewsModel;
use Rr64\App\Shared\Handler\Token;
use Rr64\App\Shared\Handler\Sanitize;

class HomeController
{
    private $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsModel();
    }

    public function index()
    {
        if (Token::hasToken() && isset($_COOKIE['user'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $user = unserialize($_COOKIE['user']);

                $response = $this->newsRepository->insertPost($user['id'], $title, $content);

                if (isset($response)) {
                    header('Location: /home');
                    $_POST = array();
                } else {
                    include __DIR__ .  '/../views/home/home.php';
                }
            } else {
                include __DIR__ .  '/../views/home/home.php';
            }
        } else {
            header('Location: /login');
            $_POST = array();
            exit;
        }
    }
}
