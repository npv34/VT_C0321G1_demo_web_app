<?php

namespace Src\Controller;

use Src\Model\BookModel;

class BookController
{
    public $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    function getAllBook()
    {
        return $this->bookModel->getAll();
    }

    function create()
    {
        // lay du lieu form gui len request
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
        $password = $_REQUEST['password'];
        $group_id = $_REQUEST['group_id'];
        $this->bookModel->add($name, $email, $address, $password, $group_id);
        // quay tro lai trang danh sach -> thay doi thuoc tinh: location cua header
        header('location: ../../index.php');
    }

    function delete()
    {
        $id = $_REQUEST['id'];
        $this->bookModel->delete($id);
        header('location: ../index.php');
    }
}