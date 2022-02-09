<?php
require 'class/Department.php';
require 'Database.php';
require 'Security.php';
require'CRUD.php';
Secure::Session();

Database::dbConnect();

$dept= new Departments();
$dept->deleteDepartments($_GET['id']);
