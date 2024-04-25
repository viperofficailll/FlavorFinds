<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="admin1.css">
</head>
<body>
    <h1>Admin??</h1>
    
    <div class="login-container">
        <form id="loginForm" action="admin1.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="passwd" placeholder="Password" required>
            <button type="submit" name="submit" value="submit">Login</button>
        </form>
    </div>
    <?php
    include 'db_conn.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $passwd = $_POST['passwd'];

        $query = "SELECT * from `admindata` WHERE `username` = '$name' AND `PASSWORD` = '$passwd'";
        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
        echo("hello");
        if ($total == 1) {
            // Valid credentials
            header("Location: controls.php");
        
        } else {
            echo "Incorrect email address or password";
        }
    }
    ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>