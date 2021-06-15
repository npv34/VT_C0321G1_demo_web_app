<?php

namespace Src\Controller;

use src\model\UserModel;

class CategoryController
{
    public $bookModel;
    public function __construct()
    {
        $this->bookModel = new UserModel();
    }
}