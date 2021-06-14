<?php
include_once "vendor/autoload.php";

use Src\Controller\BookController;

$bookController = new BookController();
$data = $bookController->getAllBook();


?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>

    </style>
</head>
<body>
<div class="container">
    <div>
        <a href="view/groups/list.php">Group manager</a>
    </div>

    <a href="view/books/add.php" class="add-user">Add</a>
    <table border="1" id="list-user">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Address</td>
            <td>Group</td>
            <td></td>
        </tr>
        <?php foreach ($data as $key => $item): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['address'] ?></td>
            <td><?php echo $item['groupName'] ?></td>
            <td><a class="delete-user" onclick="return confirm('Are you sure?')" href="action/delete.php?id=<?php echo $item['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

</body>
</html>