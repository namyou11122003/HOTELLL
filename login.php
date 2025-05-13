<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .remember-me input {
            margin-right: 0.5rem;
        }

        .login-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.75rem;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .login-button:hover {
            background-color: #45a049;
        }

        .form-footer {
            text-align: center;
            margin-top: 1rem;
        }

        .form-footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
            <p>Please enter your credentials to log in</p>
        </div>

        <form id="loginForm" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="login-button" name="login">Log In</button>
        </form>

        <div class="form-footer">
            <p><a href="#">Forgot password?</a></p>
            <p>Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
    <?php
    $con = new mysqli("localhost", "root", "", "hotel");
    if (isset($_POST['login'])) {
        $name = $_POST['username'];
        $pwd = $_POST['password'];
        $employee_Sql = "SELECT * FROM `admin` WHERE admin_name = $name AND admin_pw  = $pwd";
        $employee_Result = $con->query($employee_Sql);
        if ($employee_result->num_rows > 0) {
            $row = $employee_result->fetch_assoc();
            if ($row['admin_pw']) {
                $_SESSION['name'] = $row['admin_name'];
                header("location : ./admin/dashboard.php");
                exit();

            }
        }
    }

    ?>


</body>

</html>