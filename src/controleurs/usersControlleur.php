<?php

declare(strict_types=1);

namespace App\controlleurs;

use App\utils\Database;

function getUsers(){
    echo 'ceci est la liste des users';

    $db = new Database();
    $db->connectDB();
    $sql = "SELECT * FROM users";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($users);
}

function getUserById($id){
    echo 'ceci est un user';
}

