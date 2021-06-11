<?php

use Src\Controller\BookController;

include_once "../vendor/autoload.php";

try {
   $bookController = new BookController();
   $bookController->delete();

}catch (PDOException $PDOException) {
    echo 'Co noi xay ra: ' . $PDOException->getMessage();
    echo '<a href="../index.php">Quay lai</a>';
    die();
}

