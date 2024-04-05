<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <img src="logo.png" alt="" srcset="">
    <div class="signup-container">
        <form id="signupForm" action="save1.php" method="post">
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="phonenumber">Phone Number:</label>
            <input type="tel" id="number" name="number" pattern="[0-9]{10}" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Sign Up</button>
        </form>

    </div>
    <div>
        <h3>Already have an account ???<a href="login.php" >login</a></li></h3>
    </div>
</body>
</html>
