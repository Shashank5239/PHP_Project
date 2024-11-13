<?php
session_start();
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to fetch user
    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables if login is successful
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];

            // Redirect to welcome page
            header("Location: welcome.php");
            exit;
        } else {
            header("Location: login2.php");
        }
    } else {
        header("Location: login2.php");
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Simple HTML form for user login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care Login</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #74c1cec8; /* Light blue background */
        }
        .container {
            max-width: 400px;
            margin-top: 150px;
            margin-left: 535px;
            padding: 20px;
            background-color: #ffffff; /* White container background */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #008080; /* Dark green heading color */
        }
        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #008080; /* Dark green submit button color */
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #006666; /* Darker green on hover */
        }
        /* Social login buttons */
        .social-buttons {
            display: flex;
            /* justify-content: space-between; */
            margin-top: 20px;
        }
        .social-button {
            background-color: #3b5998; /* Facebook blue */
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .social-button:hover {
            background-color: #006666;  /* Darker blue on hover */
        }
        .google-button {
            background-color: #db4a39; /* Google red */
            margin-left: 30px;
        }
        .facebook-button{
            /* background-color: #db4a39; */
            margin-left: 20px;

        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Health Care Login</h1>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Log In">
        </form>
        <a href="signup.php" class="login-link">Are you a new user? Sign Up</a>
        <div class="social-buttons">
            <div class="social-button facebook-button">Log in with Facebook</div>
            <div class="social-button google-button">Log in with Google</div>
        </div>
    </div>
  
</body>
</html>

