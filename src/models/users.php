<?php

declare(strict_types=1);

namespace APP\models;

use APP\views\JsonView;
use APP\utils\Database;
use PDO;

class Users
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUsers() 
    {
        $this->db->connectDB();
        $sql = "SELECT * FROM users";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) 
    {
        $this->db->connectDB();
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->db->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}