<?php
 // ket noi den csdl

include_once "src/Database.php";

$database = new Database();
$pdo = $database->connect();

// lay sanh nguoi dung trong database
// b1: chuan bi cau lenh SQL tuong ung
$sql = 'SELECT users.id, users.name, users.email, users.address, groups.name as `groupName`
        FROM `users`
        JOIN `groups` 
        ON users.group_id = groups.id';
$stmt = $pdo->prepare($sql);

// b2: thuc thi cau lenh
$stmt->execute();

// b3: Lay ra du lieu
$data = $stmt->fetchAll(); // fetchAll() Lay tat ca cac hang;

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 500px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <a href="view/groups/list.php">Group manager</a>
    </div>

    <a href="view/add.php">Add</a>
    <table border="1">
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
            <td>1</td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['email'] ?></td>
            <td><?php echo $item['address'] ?></td>
            <td><?php echo $item['groupName'] ?></td>
            <td><a onclick="return confirm('Are you sure?')" href="action/delete.php?id=<?php echo $item['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

</body>
</html>