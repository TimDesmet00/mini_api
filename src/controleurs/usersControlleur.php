<?php

declare(strict_types=1);

// namespace App\controlleurs;

use APP\utils\Database;
use APP\models\Json;

function getUsers(){
    // echo 'ceci est la liste des users';
    $db = new Database();
    $db->connectDB();
    $sql = "SELECT * FROM users";
    $stmt = $db->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($users);
    // sendJSON($users);
    $json = new Json();
    $json->sendJSON($users);
}

function getUserById($id){
    // echo 'ceci est un user';
    $db = new Database();
    $db->connectDB();
    $sql = "SELECT * FROM users WHERE id = :id";
    $params = [
        ':id' => $id
    ];
    $stmt = $db->query($sql, $params);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($user);
    // sendJSON($user);
    $json = new Json();
    $json->sendJSON($user);
}

