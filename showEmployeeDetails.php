<?php
require 'class/Employee.php';
require 'Database.php';
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

$emps = new Employees;
$employee = $emps->showEmployeeDetails($_GET['id'])
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<table>
    <thead>
    <th>ID</th>
    <?php if ($_SESSION['isManager']) : ?>
        <th>Title</th>
    <?php endif ?>
    <th>Name</th>
    <th>Gender</th>
    <?php if ($_SESSION['isManager']) : ?>
        <th>Salary</th>
        <th>Birthday</th>
    <?php endif ?>
    </thead>
    <tbody>
    <tr>
        <td><?= $employee['emp_no'] ?></td>
        <?php if ($_SESSION['isManager']) : ?>
            <td><?= $employee['title'] ?></td>
        <?php endif ?>

        <td><?= $employee['first_name'] . " " . $employee['last_name'] ?></td>
        <td><?= $employee['gender'] ?></td>
        <?php if ($_SESSION['isManager']) : ?>
            <td><?= $employee['salary'] ?></td>
            <td><?= $employee['birth_date'] ?></td>
        <?php endif ?>

    </tr>
    </tbody>
</table>


</body>
</html>