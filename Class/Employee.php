<?php


class Employees
{

    public function getAllEmployeesByDeptId($deptNo)
    {
        $employees = [];
        if ($result = mysqli_query(Database::dbConnect(), EmployeesCRUD::SelectEmployees($deptNo))) {
            if (mysqli_num_rows($result) > 0) {
                $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }
        return $employees;
    }

    public function generateEmployeeId()
    {
        $id = [];
        if ($result = mysqli_query(Database::dbConnect(), EmployeesCRUD::GenerateId())) {
            if (mysqli_num_rows($result) > 0) {
                $id = mysqli_fetch_assoc($result)['emp_no'] + 1;
            }
            return $id;
        }
    }

    public function selectAllTitlesFromEmployees()
    {
        $titles = [];
        if ($result = mysqli_query(Database::dbConnect(), EmployeesCRUD::GetTitles())) {
            if (mysqli_num_rows($result) > 0) {
                $titles = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }
        return $titles;
    }
    public function insertIntoEmployees($id, $birthday, $firstName, $lastName, $gender)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::InsertEmployees($id, $birthday, $firstName, $lastName, $gender))) {
            echo "Inserted into employees table <br />";
        }
    }

    public function insertIntoEmployeesByDeptId($id,$deptNo)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::Insert('dept_emp','emp_no','dept_no',$id,$deptNo))) {
            echo "Inserted into dept_emp table <br />";
        }
    }

    public function insertTitleForEmployee($id,$deptNo)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::Insert('titles','emp_no','title',$id,$deptNo))) {
            echo "Inserted into titles table <br />";
        }
    }

    public function enterEmployeeSalary($id,$deptNo)
    {

        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::Insert('salaries','emp_no','salary',$id,$deptNo))) {
            echo "Inserted into salaries table <br />";
        }
    }

    public function updateDeptEmp($deptNo, $empNo)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::Update('dept_emp','dept_no',$deptNo,$empNo))) {
            echo "dept_emp table updated <br />";
        }
    }

    public function updateTitles($title, $empNo)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::Update('titles','title',$title,$empNo))) {
            echo "titles table updated <br />";
        }
    }

    public function updateSalaries($salary, $empNo)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::Update('salaries','salary',$salary,$empNo))) {
            echo "salaries table updated <br />";
        }
    }

    public function updateEmployees($firstName, $lastName, $gender, $birthday, $empNo)
    {
        if (mysqli_query(Database::dbConnect(), EmployeesCRUD::UpdateEmployees($firstName, $lastName, $gender, $birthday, $empNo))) {
            echo "employees table updated <br />";
        }
    }

    public function mergingAllTables($empNo)
    {
        $employee = [];
        if ($result = mysqli_query(Database::dbConnect(), EmployeesCRUD::MergingTables($empNo))) {
            if (mysqli_num_rows($result) > 0) {
                $employee = mysqli_fetch_assoc($result);
            }
        }
        return $employee;
    }

    public function selectingAllFromDepartments()
    {
        $result = mysqli_query(Database::dbConnect(), DepartmentsCRUD::Select('departments'));
        $departments = [];
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $departments = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }
        return $departments;
    }

    public function selectingAllTitles()
    {
        $titles = [];
        if ($result = mysqli_query(Database::dbConnect(), EmployeesCRUD::GetTitles())) {
            if (mysqli_num_rows($result) > 0) {
                $titles = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }
        return $titles;
    }

    public function showEmployeeDetails($empNo)
    {
        $employee = [];
        if ($result = mysqli_query(Database::dbConnect(),EmployeesCRUD::MergingTables($empNo))) {
            if (mysqli_num_rows($result) > 0) {
                $employee = mysqli_fetch_assoc($result);
            }
        }
        return $employee;
    }

    public function deleteEmployee($num)
    {
        if (mysqli_query(Database::dbConnect(), DepartmentsCRUD::Delete('employees','emp_no',$num))) {
            header('Location: showEmployees.php?id=' . $_GET['deptNo']);
        } else {
            echo 'Something went wrong';
        }
    }
}