<?php

declare(strict_types=1);

namespace App\controleurs;

use APP\utils\Database;
use APP\views\JsonView;
use PDO;

class RolesController
{
    private $db;
    private $json;

    public function __construct()
    {
        $this->db = new Database();
        $this->json = new JsonView();
    }

    public function getRoles() 
    {
        $this->db->connectDB();
        $sql = "SELECT * FROM roles";
        $stmt = $this->db->query($sql);
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->json->sendJSON($roles);
    }

    public function getRoleById($id) 
    {
        $this->db->connectDB();
        $sql = "SELECT * FROM roles WHERE id = :id";
        $params = 
        [
            ':id' => $id
        ];
        $stmt = $this->db->query($sql, $params);
        $role = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->json->sendJSON($role);
    }
}