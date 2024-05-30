<?php

namespace Rr64\App\Controller;

use Rr64\App\Model\NewsModel;

class NewsController
{
    public function getNews()
    {
        $newsRepository = new NewsModel();
        $data = $newsRepository->getPosts();
        return $data;
    }
}