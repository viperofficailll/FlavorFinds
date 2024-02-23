<?php
session_start(); // Start the session

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'falvorfinds';

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user data from the form
$uname = $_POST['name'];
$passwd = $_POST['password'];// Hash the password
$email = $_POST['email'];
$age = $_POST['age'];
$number = $_POST['number'];
$location = $_POST['location'];

// Check if the email is already taken
$email_check_query = "SELECT * FROM `userdata` WHERE `email`='$email' LIMIT 1";
$email_check_result = mysqli_query($con, $email_check_query);

if (mysqli_num_rows($email_check_result) > 0) {
    // Email is already taken
    echo "Email already taken. Please choose another email.";
} else {
    // Email is not taken, proceed with registration

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO `userdata`(`username`, `passwd`, `email`, `age`, `phone`, `location`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssss", $uname, $passwd, $email, $age, $number, $location);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check the result
    if ($result) {
        // Registration successful, set session variables
        $_SESSION['email'] = $email;
       $_SESSION['location'] = $location;

        echo "Form submitted successfully. User session started. <br>";
        echo '<button onclick="location.href=\'home.php\'">Go to Home</button>';
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($con);

