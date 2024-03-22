<?php
// Include the database connection file
require ('../db_connection.php');

// Initialize the session
session_start();

// Check if the user is already logged in, redirect to index.php
if (isset ($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user exists
    $sql = "SELECT * FROM user WHERE email = '$email' AND pass = '$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die ('Error in query: ' . mysqli_error($conn));
    }

    // Check if a matching user is found
    if (mysqli_num_rows($result) > 0) {
        // Store user details in the session
        $_SESSION['email'] = $email;

        // Redirect to the index page
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Invalid email or password";
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .login-container h2 {
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
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form">
            <div class="form-group">
                <label for="login-username">Username:</label>
                <input type="text" id="login-username" name="login-username" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="login-password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="switch-form">
            <p>Don't have an account? <a href="register.php" id="switch-to-register">Register</a></p>
        </div>
    </div>
</body>

</html>