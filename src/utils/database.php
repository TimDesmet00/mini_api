<?php

declare(strict_types=1);

namespace App\utils;

$dotenv = Dotenv\Dotenv::createImmutable(DIR);
$dotenv->load();


use PDO;
use PDOException;

class Database 
{

    public function connectDB()
    {
        try {
            $dsn = "$host;$db";
            new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'connection réussie';
        }
        catch(PDOException $e)
        {
            echo 'erreur de connection: ' . $e->getMessage();
        }
    }

    public function query($sql) {
        if ($this->pdo === null) {
            throw new \Exception('Must connect to DB before querying');
        }
        return $this->pdo->query($sql);
    }
}