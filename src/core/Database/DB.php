<?php

namespace Rr64\App\Core\Database;

class DB
{
    private $pdo;

    private $host = 'localhost';
    private $dbname = 'blog';
    private $username = 'root';
    private $password = 'admin..';

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "[PDO EXCEPTION] Error connection: " . $e->getMessage();
        }
    }

    /**
     * 
     * 
     * @param string $query
     */
    public function exec(string $query)
    {
        $result = $this->pdo->query($query);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function __pdo()
    {
        return $this->pdo;
    }
}
