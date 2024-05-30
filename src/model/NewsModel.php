<?php

namespace Rr64\App\Model;

use Rr64\App\Core\Database\DB;

class NewsModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }


    public function getPosts()
    {
        $query = "SELECT posts.*, users.*, posts.created_at as post_date
        FROM posts
        INNER JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC
        ";
        $response = $this->db->exec($query);
        return $response;
    }

    public function getPost($id)
    {
        $query = "SELECT * FROM posts WHERE id = $id";
        $response = $this->db->exec($query);
        return $response[0];
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM posts WHERE id = $id";
        $this->db->exec($query);
    }

    public function insertPost($user_id, $title, $content)
    {

        $prepareInsertPostStmt = $this->db->__pdo()->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
        $prepareInsertPostStmt->execute([$user_id, $title, $content]);
        return $prepareInsertPostStmt->fetch();
    }

    public function updatePost($id, $title, $content)
    {
        $prepareUpdatePostStmt = $this->db->__pdo()->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        return $prepareUpdatePostStmt->execute([$title, $content, $id]);
    }
}
