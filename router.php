<?php

use Src\Controller\HomeController;
use Src\Controller\UserController;

$page = $_REQUEST['page'] ?? '';
$action = $_REQUEST['action'] ?? '';

switch ($page) {
    case 'users':
        $userController = new UserController();
        switch ($action) {
            case "delete":
                $userController->delete();
                break;
            case "create":
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $userController->create();
                } else {
                    $userController->store();
                }
                break;
            default:
                $userController->getAllUser();
        }
        break;
    default:
        $homeController = new HomeController();
        $homeController->showDashBoard();
        break;

}
