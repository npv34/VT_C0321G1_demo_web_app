<?php
namespace Src\Model;

class GroupModel extends Model
{
    public function getAll() {

        $sql = 'SELECT id, name FROM `groups`';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}