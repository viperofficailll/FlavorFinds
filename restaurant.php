<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>restaurant details</title>
    <link rel="stylesheet" href="restaurant.css">
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
        
        echo "<p>  <h1>$restaurantName</p></h1>   ";
        echo "<p> <h2>$restaurantlocation</h2>     </p>";
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
echo'<table>';
echo '<tr> <th>Rating</th> <th>Review</th> <th>Email</th> </tr>';

if ($review_result->num_rows > 0) {
    // Display each review and rating
    while ($review_row = $review_result->fetch_assoc()) {
        $rating = $review_row['ratings'];
        $review = $review_row['review'];
        $email = $review_row['email'];
        
            echo "<tr><td>$rating</td><td>$review</td><td>$email</td></tr>";
        
    }
    echo "</table>";
} else {
    echo "<p>No previous data available.</p>";
}


echo'<h1>Rating</h1>';
// ratings section

$mql = "SELECT * FROM `searchfood` WHERE `restaurantid`=$restaurantid"; 
$result1 = $conn->query($mql);
if ($result1->num_rows > 0) {
    $row1= $result1->fetch_assoc();
    $restaurantrating = $row1['ratings'];
    echo "<p>  <h4>$restaurantrating</p></h4>   ";
    echo'<h1>Visited this Restaurant ??? Rate it and Give us a Review .</h1>';
    ?>
    <!-- User Button -->
    <!-- <button class="ratingsandreviews" onclick="location.href='ratingsandreviews.php'"><h1> RATING AND REVIEW</h1></button> -->
    <button class="ratingsandreviews" onclick="location.href='ratingsandreviews.php?id=<?php echo $restaurantid; ?>'"><h1> RATE IT !!!</h1></button>

    <?php

}

$conn->close();
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
</body>
</html>