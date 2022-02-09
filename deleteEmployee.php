<?php
require'class/Employee.php';
require'Database.php';
require 'Security.php';
require'CRUD.php';

Secure::Session();

Database::dbConnect();

$emps = new Employees;
$emps->deleteEmployee($_GET['id']);