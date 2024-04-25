<?php
include 'db_conn.php';

if (isset($_POST["submit"])) {
    $foodname = $_POST['foodname'];
    $price = $_POST['price'];
    $variety = $_POST['variety'];
    $restaurantid = $_POST['restaurantid'];
    $restaurant = $_POST['restaurant'];
    $ratings = $_POST['ratings'];
    $location = $_POST['location'];
    $num_reviews = $_POST['num_reviews'];

    $imageData = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));

    $sql = "INSERT INTO `searchfood`(`foodname`, `price`, `variety`, `restaurantid`, `restaurant`, `ratings`, `IMAGE`, `location`, `num_reviews`) 
                VALUES ('$foodname','$price','$variety','$restaurantid','$restaurant','$ratings','$imageData','$location','$num_reviews')";
    $statement = $conn->prepare($sql);
    $statement->bind_param("ssssssss", $foodname, $price, $variety, $restaurantid, $restaurant, $ratings, $location, $num_reviews);
    if ($statement->execute()) {
        echo "Image uploaded successfully";
    } else {
        echo "Error uploading image: " . $conn->error;
    }
} 



$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>add food</title>
    <link rel="stylesheet" href="addfood.css">
</head>

<body>
    <h2>Add Food</h2>
    <form action="addfood.php" method="post" enctype="multipart/form-data">
        <label for="foodname">Food Name:</label><br>
        <input type="text" id="foodname" name="foodname" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br><br>

        <label for="variety">Variety:</label><br>
        <input type="text" id="variety" name="variety" required><br><br>

        <label for="restaurantid">Restaurant ID:</label><br>
        <input type="text" id="restaurantid" name="restaurantid" required><br><br>

        <label for="restaurant">Restaurant Name:</label><br>
        <input type="text" id="restaurant" name="restaurant" required><br><br>

        <label for="ratings">Ratings:</label><br>
        <input type="text" id="ratings" name="ratings" required><br><br>



        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" placeholder="city" required><br><br>

        <label for="num_reviews">Number of Reviews:</label><br>
        <input type="text" id="num_reviews" name="num_reviews" required><br><br>



        <input type="file" id="image" name="image" required>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>