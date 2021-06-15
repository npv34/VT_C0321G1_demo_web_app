<?php

namespace Src\Controller;

use Src\Model\GroupModel;
use Src\Model\UserModel;

class UserController
{
    public $userModel;
    public $groupModel;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
        $this->userModel = new UserModel();
    }

    function getAllUser()
    {
        $users = $this->userModel->getAll();
        include_once "view/users/list.php";
    }

    function create()
    {
        $groups = $this->groupModel->getAll();
        include_once "view/users/add.php";
    }

    function store()
    {
        // lay du lieu form gui len request
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
        $password = $_REQUEST['password'];
        $group_id = $_REQUEST['group_id'];
        $this->userModel->add($name, $email, $address, $password, $group_id);
        // quay tro lai trang danh sach -> thay doi thuoc tinh: location cua header
        header('location:index.php?page=users');
    }

    function delete()
    {
        $id = $_REQUEST['id'];
        $this->userModel->delete($id);
        header('location:index.php?page=users');
    }
}