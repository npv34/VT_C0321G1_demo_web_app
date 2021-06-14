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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
<div class="container">
    <form action="" method="post" id="form-add-user">
        <table id="add-user">
            <tr>
                <td class="td-title">Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td class="td-title">Email</td>
                <td>
                    <input type="text" onkeyup="validationForm()" id="email-user" name="email">
                    <br>
                    <strong id="error-email"></strong>
                </td>

            </tr>
            <tr>
                <td class="td-title">Group</td>
                <td>
                    <select name="group_id" id="">
                        <?php foreach ($groups as $item): ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td-title">Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td class="td-title">Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td class="td-title">

                </td>
                <td><button type="submit" id="btn-add-user">Add</button></td>
            </tr>
        </table>
    </form>
    <script src="../../public/js/my.js"></script>
</div>
</body>
</html>

