<?php
class DepartmentsCRUD extends Database
{
    public static function Select($select)
    {
        return "SELECT * FROM $select";
    }

    public static function GenIdAndSelect()
    {
        return "SELECT dept_no
                FROM departments
                ORDER BY dept_no DESC
                LIMIT 1";
    }

    public static function InsertDept($id, $deptName)
    {
        return "INSERT INTO departments
                (dept_no, dept_name)
                VALUES
                ('$id', '$deptName')";
    }

    public static function SelectDeptName($deptNo)
    {
        return "SELECT *
            FROM departments
            WHERE dept_no = '$deptNo'";
    }

    public static function EditInsertDept($deptName, $deptNo)
    {
        return "UPDATE departments
                SET dept_name = '$deptName'
                WHERE dept_no = '$deptNo'";
    }

    public static function Delete($delete,$depEmp,$num)
    {
        return "DELETE FROM $delete WHERE $depEmp = '$num'";
    }
}

class EmployeesCRUD
{

    public static function SelectEmployees($deptNo)
    {
        return "SELECT e.emp_no, e.first_name, e.last_name, dm.emp_no as managerId FROM employees e
            INNER JOIN dept_emp de ON e.emp_no = de.emp_no
            LEFT JOIN dept_manager dm ON e.emp_no = dm.emp_no
            WHERE de.dept_no = '$deptNo'
            ORDER BY dm.emp_no DESC, de.emp_no DESC
            LIMIT 20";
    }

    public static function GenerateId()
    {
        return "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1";
    }

    public static function GetTitles()
    {
        return 'SELECT DISTINCT(title) FROM titles';
    }

    public static function InsertEmployees($id, $birthday, $firstName, $lastName, $gender)
    {
        return "INSERT INTO employees 
                (emp_no, birth_date, first_name, last_name, gender, hire_date)
                VALUES
                ('$id', '$birthday','$firstName','$lastName','$gender', NOW())";
    }

    public static function Insert($value,$emp_no,$dep,$id,$deptNo)
    {
        return "INSERT INTO $value
                ($emp_no, $dep, from_date, to_date)
                VALUES
                ('$id', '$deptNo', NOW(), NOW())";
    }

    public static function Update($table,$value,$deptNo, $empNo)
    {
        return "UPDATE $table SET $value = '$deptNo' WHERE emp_no = '$empNo' ";
    }

    public static function UpdateEmployees($firstName, $lastName, $gender, $birthday, $empNo)
    {
        return "UPDATE employees SET 
                first_name = '$firstName',
                last_name = '$lastName', 
                gender = '$gender',
                birth_date = '$birthday'
                WHERE emp_no = '$empNo'";
    }

    public static function MergingTables($empNo)
    {
        return "SELECT e.emp_no, tmp.title, e.first_name, e.last_name, e.gender, s.salary, e.birth_date, de.dept_no FROM employees e
            INNER JOIN dept_emp de ON e.emp_no = de.emp_no
            INNER JOIN salaries s ON e.emp_no = s.emp_no
            INNER JOIN (
                SELECT emp_no, title FROM titles
                WHERE emp_no = '$empNo'
                ORDER BY from_date DESC
                LIMIT 1
            ) tmp ON e.emp_no = tmp.emp_no
            WHERE e.emp_no = '$empNo'
            ORDER BY s.from_date DESC LIMIT 1";
    }
}