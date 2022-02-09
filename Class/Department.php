<?php

class Departments
{
    public function getAllDepts()
    {
        $result = mysqli_query(Database::dbConnect(),DepartmentsCRUD::Select('departments'));
        $departments = [];
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                $departments = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }
        return $departments;
    }

    public function generatingDeptId()
    {
        if($result = mysqli_query(Database::dbConnect(), DepartmentsCRUD::GenIdAndSelect())) {
            if(mysqli_num_rows($result) > 0) {
                $id = mysqli_fetch_assoc($result)['dept_no'];
            }
        }
        $id = substr($id, 1) + 1;
        $id = 'd0' . $id;
        return $id;
    }

    public function insertIntoDepartments($id,$deptName)
    {
        if(mysqli_query(Database::dbConnect(), DepartmentsCRUD::InsertDept($id,$deptName))) {
            header('Location: index.php');
        } else {
            echo 'Something went wrong';
        }
    }

    public function editAndGetDeptId($deptNo)
    {
        $deptName="";
        if($result = mysqli_query(Database::dbConnect(), DepartmentsCRUD::SelectDeptName($deptNo))) {
            if(mysqli_num_rows($result) > 0) {
                $deptName = mysqli_fetch_assoc($result)['dept_name'];
            }
            return $deptName;
        }
    }

    public function insertEditIntoDepts($deptNo,$deptName)
    {
        if(mysqli_query(Database::dbConnect(), DepartmentsCRUD::EditInsertDept($deptNo,$deptName))) {
            header('Location: index.php');
        } else {
            echo 'Something went wrong';
        }
    }

    public function deleteDepartments($num)
    {
        if(mysqli_query(Database::dbConnect(), DepartmentsCRUD::Delete('departments','dept_no',$num))) {
            header('Location: index.php');
        } else {
            echo 'Something went wrong';
        }
    }
}

