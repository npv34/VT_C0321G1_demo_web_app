<?php

include_once "../src/Database.php";

$database = new Database();
$pdo = $database->connect();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // lay du lieu form gui len request
     $name = $_REQUEST['name'];
     $email = $_REQUEST['email'];
     $address = $_REQUEST['address'];
     $password = $_REQUEST['password'];
     $group_id = $_REQUEST['group_id'];


     // luu vao csdl
     // b1: chuan bi cau lenh insert
     $sql = 'INSERT INTO `users`(`name`, `email`, `address`, `password`, `group_id`)
             VALUES (?, ?, ?, ?, ? )';
     $stmt = $pdo->prepare($sql);

     //b2: gan du lieu vao cau lenh sql
     $stmt->bindParam(1, $name);
     $stmt->bindParam(2, $email);
     $stmt->bindParam(3, $address);
     $stmt->bindParam(4, $password);
     $stmt->bindParam(5, $group_id);

     //b3 thuc thi
     $stmt->execute();

    // quay tro lai trang danh sach -> thay doi thuoc tinh: location cua header
     header('location: ../index.php');

 }


 // lay danh sach group
// b1: chuan bi cau lenh SQL tuong ung
$sql = 'SELECT id, name FROM `groups`';
$stmt = $pdo->prepare($sql);

// b2: thuc thi cau lenh
$stmt->execute();

// b3: Lay ra du lieu
$data = $stmt->fetchAll(); // fetchAll() Lay tat ca cac hang;
?>



<form action="" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Group</td>
            <td>
                <select name="group_id" id="">
                    <?php foreach ($data as $item): ?>
                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            <td>
                <button type="submit">Add</button>
            </td>
        </tr>
    </table>
</form>