<?php

declare(strict_types=1);

namespace App\controleurs;

use APP\utils\Database;
use APP\views\JsonView;
use APP\models\Roles;
use PDO;

class RolesController
{
    private $rolesModel;
    private $view;

    public function __construct()
    {
        $this->rolesModel = new Roles();
        $this->view = new JsonView();
    }

    public function getRoles()
    {
        $roles = $this->rolesModel->getRoles();
        $this->view->sendJSON($roles);
    }

    public function getRoleById($id)
    {
        $role = $this->rolesModel->getRoleById($id);
        $this->view->sendJSON($role);
    }
}