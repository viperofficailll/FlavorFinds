<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>restaurant details</title>
</head>
<body>
<?php
session_start(); // Start the session
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// Display the username and location from the session
$email = $_SESSION["email"];
$location = isset($_SESSION["location"]) ? $_SESSION["location"] : "Unknown";

// Include database connection
include 'db_conn.php';

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $restaurantid = $_GET['id']; // Get the restaurant ID from the URL parameter

    // Fetch restaurant details based on the ID
    $sql = "SELECT * FROM `restaurant` WHERE `restaurantid` = '$restaurantid'  ";
    $result = $conn->query($sql);
   

    if ($result->num_rows > 0) {
        
       while($row = $result->fetch_assoc()){
        
        $restaurantName = $row['restaurantname'];
        $restaurantlocation = $row['restaurantlocation'];
        $currentfood = $row['foodItServes'];
        // image lai k garni??????
        // $ratings = $row['ratings'];
        // Display restaurant details
        echo "<h1>Restaurant Details</h1>";
        echo "<p>Restaurant Name:  <h2>$restaurantName</p></h2>   ";
        echo "<p>Restaurant location: <h2>$restaurantlocation</h2>     </p>";
        echo"<p> Food for which this restaurant is recommended: <h4>$currentfood </h4>     ";
        // Add more details as needed
       }
    } else {
        echo "yeta ho bigreko";
    }
} else {
    echo "Invalid request";
}

// Fetch and display previous reviews and ratings
$review_sql = "SELECT * FROM `reviews` WHERE `id` = $restaurantid";
$review_result = $conn->query($review_sql);

echo '<h1>Previous Reviews and Ratings</h1>';
if ($review_result->num_rows > 0) {
    // Display each review and rating
    while ($review_row = $review_result->fetch_assoc()) {
        $rating = $review_row['ratings'];
        $review = $review_row['review'];
        echo "<p><strong>Rating:</strong> $rating</p>";
        echo "<p><strong>Review:</strong> $review</p>";
    }
} else {
    echo "<p>No previous data available.</p>";
}


echo'<h1>Ratings</h1>';
// ratings section

$mql = "SELECT * FROM `searchfood` WHERE `restaurantid`=$restaurantid"; 
$result1 = $conn->query($mql);
if ($result1->num_rows > 0) {
    $row1= $result1->fetch_assoc();
    $restaurantrating = $row1['ratings'];
    echo "<p>Restaurant rating:  <h4>$restaurantrating</p></h4>   ";
    echo'<h1>visited this restaurant ??? rate it and give us a review .</h1>';
    ?>
    <!-- User Button -->
    <!-- <button class="ratingsandreviews" onclick="location.href='ratingsandreviews.php'"><h1> RATING AND REVIEW</h1></button> -->
    <button class="ratingsandreviews" onclick="location.href='ratingsandreviews.php?id=<?php echo $restaurantid; ?>'"><h1> RATING AND REVIEW</h1></button>

    <?php

}

$conn->close();
    ?>
</body>
</html>


