<?php
require('class/Employee.php');
require('Database.php');
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

$emps = new Employees();


if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $salary = $_POST['salary'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $id = $emps->generateEmployeeId();

    $emps->insertIntoEmployees($id, $firstName, $lastName, $gender, $birthday);
    $emps->insertIntoEmployeesByDeptId($id, $_GET['id']);
    $emps->insertTitleForEmployee($id, $title);
    $emps->enterEmployeeSalary($id, $salary);

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
    Title <br/>
    <select name="title" id="">
        <?php foreach ($emps->selectAllTitlesFromEmployees() as $t) : ?>
            <option value="<?= $t['title'] ?>"><?= $t['title'] ?></option>
        <?php endforeach ?>
    </select> <br/>

    First Name <br/>
    <input type="text" name="first_name"> <br/>
    Last Name <br/>
    <input type="text" name="last_name"> <br/>

    Gender <br/>
    <select name="gender" id="">
        <option value="F">Female</option>
        <option value="M">Male</option>
    </select> <br/>

    Salary <br/>
    <input type="text" name="salary"> <br/>

    Birthday <br/>
    <input type="text" name="birthday"> <br/>

    <input type="submit" name="submit">
</form>
</body>
</html>