<?php

namespace Src\Controller;

use src\model\BookModel;

class CategoryController
{
    public $bookModel;
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }
}