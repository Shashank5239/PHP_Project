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
        <h3 style="color: #db4a39; text-align: center;">Invalid Username or Password</h3>
        <form action="welcome.php" >
            <!-- <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required> -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input onclick="openmainpage()" type="submit" value="Log In">
        </form>
        <a href="signup.html" class="login-link">Are you a new user? Sign Up</a>
        <div class="social-buttons">
            <div class="social-button facebook-button">Log in with Facebook</div>
            <div class="social-button google-button">Log in with Google</div>
        </div>
    </div>
    <script>
        function openmainpage() {
            
            window.open('welcome.php', '_self');
        }
    </script>
</body>
</html>
