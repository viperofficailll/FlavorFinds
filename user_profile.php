<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch user details from the session
$email = $_SESSION['email'];
$location = $_SESSION['location'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css"> <!-- Add a stylesheet if needed -->
    <title>User Profile</title>
</head>

<body>
    <h1>User Profile</h1>
    
    <div>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Location:</strong> <?php echo $location; ?></p>
    </div>
    
    <a href="home.php">Go back to home</a>
</body>

</html>
