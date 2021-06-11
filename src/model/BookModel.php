<?php
namespace Src\Model;

class BookModel extends Model
{
    function getAll()
    {
        $sql = 'SELECT users.id, users.name, users.email, users.address, groups.name as `groupName`
        FROM `users`
        JOIN `groups` 
        ON users.group_id = groups.id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    function add($name, $email, $address, $password, $group_id) {
        // luu vao csdl
        // b1: chuan bi cau lenh insert
        $sql = 'INSERT INTO `users`(`name`, `email`, `address`, `password`, `group_id`)
             VALUES (?, ?, ?, ?, ? )';
        $stmt = $this->pdo->prepare($sql);

        //b2: gan du lieu vao cau lenh sql
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $address);
        $stmt->bindParam(4, $password);
        $stmt->bindParam(5, $group_id);

        //b3 thuc thi
        $stmt->execute();
    }

    function delete($id) {
        $sql = 'DELETE FROM `users` WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }
}