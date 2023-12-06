<?php

declare(strict_types=1);

namespace APP\utils;

use Dotenv\Dotenv;
use PDO;
use PDOException;




class Database 
{
    private $pdo;

    public function connectDB()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['host'];
        $db = $_ENV['db'];
        $user = $_ENV['user'];
        $pass = $_ENV['pass'];

        try {
            $dsn = "$host;$db";
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'connection réussie';
        }
        catch(PDOException $e)
        {
            echo 'erreur de connection: ' . $e->getMessage();
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}