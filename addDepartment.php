<?php

require('Database.php');
require('class/Department.php');
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

if(isset($_POST['submit'])) {
    $dept= new Departments();
    $dept->insertIntoDepartments($dept->generatingDeptId(),$_POST['dept_name']);
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
        Department name <br />
        <input type="text" name="dept_name"> <br />
        <input type="submit" name="submit">
    </form>
</body>
</html>