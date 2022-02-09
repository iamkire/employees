<?php
session_start();
include'Database.php';
include 'class/Login.view.php';
require'CRUD.php';

Database::dbConnect();

if(isset($_POST['submit'])) {

    $login = new Login;
    $login->LoginVerify($_POST["username"],$_POST["password"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Username
        <input type="text" name="username" id="">
        Password
        <input type="password" name="password" id="">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>

