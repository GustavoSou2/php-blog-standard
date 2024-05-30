<?php

namespace Rr64\App\Model;

use Rr64\App\Core\Database\DB;


class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getUsers()
    {
        $query = "SELECT * FROM users";
        $response = $this->db->exec($query);
        return $response;
    }

    public function getUser($id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        $response = $this->db->exec($query);
        return $response[0];
    }

    public function logIn($mail)
    {

        $prepareteLogInStmt = $this->db->__pdo()->prepare("SELECT * FROM users WHERE email = ?");
        $prepareteLogInStmt->execute([$mail]);
        $result = $prepareteLogInStmt->fetch();
        return $result;
    }

    public function validateIfHasUser()
    {
    }

    public function validateIfUserExists($mail)
    {
        $query = "SELECT * FROM users WHERE email = '$mail'";
        $response = $this->db->exec($query);
        return $response;
    }

    public function insertUser($username, $mail, $password)
    {
        $prepareteInsertStmt = $this->db->__pdo()->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $prepareteInsertStmt->execute([$username, $mail, $password]);
    }

    public function updateUser($id, $username, $mail, $password)
    {
        $prepareteUpdateStmt = $this->db->__pdo()->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
        return $prepareteUpdateStmt->execute([$username, $mail, $password, $id]);
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = $id";
        $this->db->exec($query);
    }
}
