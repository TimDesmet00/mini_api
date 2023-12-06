<?php

declare(strict_types=1);

namespace APP\controleurs;

use APP\utils\Database;
use APP\views\JsonView;
use APP\models\Users;
use PDO;

$users = new Users;

class UsersController
{
    private $usersModel;
    private $view;

    public function __construct()
    {
        $this->usersModel = new Users();
        $this->view = new JsonView();
    }

    public function getUsers()
    {
        $users = $this->usersModel->getUsers();
        $this->view->sendJSON($users);
    }

    public function getUserById($id)
    {
        $user = $this->usersModel->getUserById($id);
        $this->view->sendJSON($user);
    }
}