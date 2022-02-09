<?php
require'Database.php';
require'class/Employee.php';
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

$empNo = $_GET['id'];

if(isset($_POST['submit'])) {
    $deptNo = $_POST['department'];
    $title = $_POST['title'];
    $salary = $_POST['salary'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birth_date'];

    $emps= new Employees();
    $emps->updateDeptEmp($deptNo,$empNo);
    $emps->updateTitles($title,$empNo);
    $emps->updateSalaries($salary,$empNo);
    $emps->updateEmployees($firstName,$lastName,$gender,$birthday,$empNo);

}
    $emps= new Employees();
    $employee=$emps->mergingAllTables($empNo);

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
        Department <br />
        <select name="department">
            <?php foreach($emps->selectingAllFromDepartments() as $dept) : ?>
                <option value="<?= $dept['dept_no'] ?>" <?php if($employee['dept_no'] == $dept['dept_no']) echo 'selected' ?>><?= $dept['dept_name'] ?></option>
            <?php endforeach ?>
        </select> <br />
        Title <Br />
        <select name="title">
            <?php foreach($emps->selectingAllTitles() as $t) : ?>
                <option value="<?= $t['title'] ?>" <?php if($employee['title'] == $t['title']) echo 'selected' ?>><?= $t['title'] ?></option>
            <?php endforeach ?>
        </select>  <Br />
        Name<Br />
        <input type="text" name="first_name" value="<?= $employee['first_name'] ?>"><Br />
        Last Name<Br />
        <input type="text" name="last_name" value="<?= $employee['last_name'] ?>"><Br />
        Gender<Br />
        <select name="gender">
            <option value="F" <?php if($employee['gender'] == 'F') echo 'selected' ?>>Female</option>
            <option value="M" <?php if($employee['gender'] == 'M') echo 'selected' ?>>Male</option>
        </select><Br />
        Salary <br />
        <input type="text" name="salary" value="<?= $employee['salary'] ?>"> <br />
        Birthday <br />
        <input type="text" name="birth_date" value="<?= $employee['birth_date'] ?>"> <br />
        <input type="submit" name="submit" value="Update" >
    </form>
</body>
</html>