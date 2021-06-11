<?php

include_once "../../vendor/autoload.php";
use Src\Controller\BookController;
use Src\Controller\GroupController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $bookController = new BookController();
   $bookController->create();
}

$groupController = new GroupController();
$groups = $groupController->getAll();
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
                    <?php foreach ($groups as $item): ?>
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