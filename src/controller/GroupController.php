<?php
namespace Src\Controller;

use Src\Model\GroupModel;

class GroupController
{
    public $groupModel;
    public function __construct()
    {
        $this->groupModel = new GroupModel();
    }

    function getAll() {
        return $this->groupModel->getAll();
    }
}