<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if any field is empty
    if (empty($email) || empty($contact) || empty($username) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO signup (email, contact, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $contact, $username, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: logingateway.php");
    } else {
        echo "Error: Could not register user. Email or username might already exist.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Simple HTML form for user signup -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care SignUp</title>
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
            margin-left: 10px;

        }
        /* Login link style */
        .login-link {
            text-align: center;
            margin-top: 10px;
            color: #008080; /* Dark green link color */
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Health Care Sign Up</h1>
        



        <form action="signup.php" method="post">
            <label for="email">Email:</label>
            <input type="text"  name="email" required>
            <label for="contact">Phone Number:</label>
            <input type="text" name="contact" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="SignUp"> 
            <!-- <button type="submit">Signup</button> -->
        </form>
        <a href="login.php" class="login-link">Already have an account? Login</a>
        <div class="social-buttons">
            <div class="social-button facebook-button">Sign Up with Facebook</div>
            <div class="social-button google-button">Sign Up with Google</div>
        </div>
        
    </div>



    <!-- <script>
        function openLoginPage() {
            
            window.open('loginpage.html', '_self');
        }
    </script> -->






</body>
</html>

