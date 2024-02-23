
<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <title>Login</title>
</head>
<body>
<img class="logo" src="logo.png" alt="" srcset="">

    
    <div class="login-container">
        <form id="loginForm" action="chill.php" method="post">
            <label for="email">Useremail:</label>
            <input type="text" id="useremail" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="passwd" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <button type="submit" name="submit" value="submit">Login</button>
        </form>
    </div>
     <h3> Don't Have an Account ?? <a href="signup.php" >Signup</a></h3>
</body>
</html>
