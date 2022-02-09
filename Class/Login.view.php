<?php

class Login {


    public function LoginVerify($username,$password)
    {
        $query = "SELECT emp_no, password FROM employees WHERE username = '$username'";

        if ($result = mysqli_query(Database::dbConnect(), $query)) {
            $employee = mysqli_fetch_assoc($result);
            $hash = $employee['password'];
            $empNo = $employee["emp_no"];
            if (password_verify($password, $hash)) {
                $_SESSION['isLogged'] = true;

                $query = "SELECT * FROM dept_manager WHERE emp_no = '$empNo'";
                if ($result = mysqli_query(Database::dbConnect(), $query)) {
                    if (mysqli_num_rows($result) > 0) {
                        $_SESSION['isManager'] = true;
                    } else {
                        $_SESSION['isManager'] = false;
                    }
                }
                header('Location: index.php');
            } else {
                echo 'Login failed';
            }
        } else {
            echo "Something went wrong please check data";
        }
    }
}