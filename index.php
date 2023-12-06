<?php

// require_once 'vendor/autoload.php';
try{
    if (!empty($_GET['demande'])) {
        $url = explode('/', filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch($url[0]){
            case 'users': echo 'users';
                break;
            case 'roles': echo 'roles';
                break;
            default:
                throw new Exception('La demande n\'est pas valide.');
        }
    } else {
        throw new Exception('Problème de récupération de données.');
    }
} catch (Exception $e) {
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()

    ];
    print_r($erreur);
}