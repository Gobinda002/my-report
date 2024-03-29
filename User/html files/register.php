<?php

include("../db_connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $usename = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // hash the password before storing it into database
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // inserting the user info into the database
    $sql = "INSERT INTO user (name,email,pass,cpass)  VALUES (?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$username, $email, $pass, $cpass);

    if($stmt->execute()){
        echo "Registration sucessful";
        header("location: index.php");
        $stmt->close();
    }else{
        echo"Error" . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2a2185;
        }

        .btn {
            background-color: #2a2185;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            display: block;
            text-align: center;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #1c166d;
        }

        .switch-form {
            margin-top: 10px;
            text-align: center;
        }

        .switch-form a {
            color: #2a2185;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form>
            <div class="form-group">
                <label for="register-username">Username</label>
                <input type="text" id="register-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" id="register-password" name="pass" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="cpass" required>
            </div>
            
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="switch-form">
            <p>Already have an account? <a href="login.html" id="switch-to-login">Login</a></p>
        </div>
    </div>
</body>
</html>
