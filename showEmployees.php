<?php
require'Database.php';
require'class/Employee.php';
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

$emps = new Employees();
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
        <li><a href="addEmployee.php?id=<?= $_GET['id'] ?>">Add new employee</a></li>
    </ul>
    <?php endif ?>

    <table>
        <thead>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <?php if($_SESSION['isManager']) : ?>
                <th></th>
                <th></th>
            <?php endif ?>
        </thead>
        <tbody>
            <?php foreach($emps->getAllEmployeesByDeptId($_GET['id']) as $employee) : ?>
                <tr>
                    <td><?= $employee['emp_no'] ?></td>

                    <td><a class="<?php if($employee['managerId'] != null) echo 'manager' ?>" 
                            href="showEmployeeDetails.php?id=<?= $employee['emp_no'] ?>" >
                            <?= $employee['first_name'] . " " . $employee['last_name'] ?></a></td>
                    
                    <?php if($_SESSION['isManager']) : ?>

                    <td><a href="editEmployee.php?id=<?= $employee['emp_no'] ?>" >Edit</a></td>

                    <td><a href="deleteEmployee.php?id=<?= $employee['emp_no'] ?>&deptNo=<?= $_GET['id'] ?>" >Delete</a></td>
                    <?php endif ?>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


</body>
</html>