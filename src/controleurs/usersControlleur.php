<?php

declare(strict_types=1);

// namespace App\controlleurs;

use APP\utils\Database;

function getUsers(){
    // echo 'ceci est la liste des users';
    $db = new Database();
    $db->connectDB();
    $sql = "SELECT * FROM users";
    $stmt = $db->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($users);
    sendJSON($users);
}

function getUserById($id){
    echo 'ceci est un user';
}

function sendJSON($infos)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($infos, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
}