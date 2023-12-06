<?php

declare(strict_types=1);

namespace APP\models;

use APP\views\JsonView;
use APP\utils\Database;
use PDO;

class Roles
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getRoles() 
    {
        $this->db->connectDB();
        $sql = "SELECT * FROM roles";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoleById($id) 
    {
        $this->db->connectDB();
        $sql = "SELECT * FROM roles WHERE id = :id";
        $params = [':id' => $id];
        $stmt = $this->db->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}