<?php

namespace App\views;

class JsonView 
{
    function sendJSON($infos)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($infos, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
    }
}