<?php
require_once 'vendor/autoload.php';

use APP\controleurs\UsersController;
use APP\controleurs\RolesController;

$usersController = new UsersController();
$rolesController = new RolesController();

try{
    if (!empty($_GET['demande'])) {
        $url = explode('/', filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch($url[0])
        {
            case 'users':
                if(empty($url[1]))
                {
                    $usersController->getUsers();
                }else{
                    $usersController->getUserById($url[1]);
                }
                break;
            case 'roles':
                if(empty($url[1]))
                {
                    $rolesController->getRoles();
                }else{
                    $rolesController->getRoleById($url[1]);
                }
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