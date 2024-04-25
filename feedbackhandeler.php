<?php
session_start(); // Start the session
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $restaurantid = $_POST['restaurantid'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Get the current rating and number of reviews from the database
    $sql = "SELECT ratings, num_reviews FROM searchfood WHERE restaurantid = $restaurantid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentRating = $row['ratings'];
        $numReviews = $row['num_reviews'];

        // Calculate the new average rating
        $newRating = (($currentRating * $numReviews) + $rating) / ($numReviews + 1);

        // Update the restaurant's rating and number of reviews in the database
        $updateSql = "UPDATE searchfood SET ratings = $newRating, num_reviews = num_reviews + 1 WHERE restaurantid = $restaurantid";
        if ($conn->query($updateSql) === TRUE) {
            $email =($_SESSION["email"]);
            // Insert the new review into the database
            $insertSql = "INSERT INTO reviews (id, ratings, review,email) VALUES ($restaurantid, $rating, '$review','$email')";
            if ($conn->query($insertSql) === TRUE) {
                echo "<h3>Review submitted successfully</h3>";?>
                 <h2>Thank you for your time</h2>
                
                <a href="first.html">Back to Home?</a>
                <?php
            } else {
                echo "Error inserting review: " . $conn->error;
            }
        } else {
            echo "Error updating rating: " . $conn->error;
        }
    } else {
        echo "Restaurant not found";
    }
} else {
    // If the request method is not POST, redirect the user
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="feedbackhandler.css">
</head>
<body>
    
</body>
</html>