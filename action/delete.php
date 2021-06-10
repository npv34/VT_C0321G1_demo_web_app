<?php

include_once "../src/Database.php";

$database = new Database();
$pdo = $database->connect();

try {
    //b1: cau lenh sql
    $sql = 'DELETE FROM `users` WHERE id = ?';
    $stmt = $pdo->prepare($sql);

// b2: gan du lieu id
    $id = $_REQUEST['id'];
    $stmt->bindParam(1, $id);
    $stmt->execute();
    header('location: ../index.php');

}catch (PDOException $PDOException) {
    echo 'Co noi xay ra';
    echo '<a href="../index.php">Quay lai</a>';
    die();
}

