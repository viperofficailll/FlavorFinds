<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>

</head>
<body>
    <nav>
        <ul class="navbar">
            <li><a href="home.html">Home</a></li>
            <li><a href="aboutus.html">About Us</a></li>
           
            <li><a href="contactus.html">Contact Us</a></li>
        </ul>
    </nav>
    <div class="container">
        <img class="logo" src="finalimage.png" alt="" srcset="">
        <h1>Welcome to Our Login Page</h1> <!-- Clear Purpose -->

        <div class="login-container">
            <form id="loginForm" action="chill.php" method="post">
                <h2>Sign in to your Account</h2> <!-- Engaging Content -->
                <label for="email">Useremail:</label>
                <input type="text" id="useremail" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="passwd" required>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <button type="submit" name="submit" value="submit">Login</button> <!-- Calls to Action -->
            </form>
        </div>
        <h3> Don't Have an Account ?? <a href="signup.php">Signup</a></h3> <!-- Signup Link -->
    </div>
</body>
</html>