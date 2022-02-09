<?php
require 'class/Department.php';
require 'Database.php';
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

$dept= new Departments();
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php if($_SESSION['isManager']) : ?>
    <ul>
        <li><a href="addDepartment.php">Add new department</a></li>
    </ul>
    <?php endif ?>

    <table>
        <thead>
            <th>Dept ID</th>
            <th>Dept Name</th>

            <?php if($_SESSION['isManager']) : ?>
            <th></th>
            <th></th>
            <?php endif ?>
        </thead>
        <tbody>

            <?php foreach($dept->getAlldepts() as $dept) : ?>
                <tr>
                    <td><?= $dept['dept_no'] ?></td>
                    <td><a href="showEmployees.php?id=<?= $dept['dept_no'] ?>" ><?= $dept['dept_name'] ?></a></td>
                    <?php if($_SESSION['isManager']) : ?>
                    <td><a href="editDepartment.php?id=<?= $dept['dept_no'] ?>" >Edit</a></td>
                    <td><a href="deleteDepartment.php?id=<?= $dept['dept_no'] ?>" >Delete</a></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>