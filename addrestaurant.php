<?php
include 'db_conn.php';

if (isset($_POST["submit"])) {
    $restaurantname = $_POST["restaurantname"];
    $foodItserves = $_POST["foodItserves"];
    $restaurantlocation = $_POST["restaurantlocation"];

    $imageData = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));

    $sql = "INSERT INTO `restaurant` (restaurantname, foodItserves, restaurantlocation, restarantimage) VALUES (?, ?, ?, ?)";
    $statement = $conn->prepare($sql);

    if ($statement) {
        $statement->bind_param("ssss", $restaurantname, $foodItserves, $restaurantlocation, $imageData);

        if ($statement->execute()) {
            echo "Image uploaded successfully";
        } else {
            echo "Error uploading image: " . $conn->error;
        }
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Image</title>
</head>

<body>
    <h2>Upload Image</h2>
    <form action="addrestaurant.php" method="post" enctype="multipart/form-data">

        <input type="text" id="name" name="restaurantname" placeholder="Restaurant Name" required>
        <input type="text" id="food" name="foodItserves" placeholder="Food It Serves" required>
        <input type="text" id="location" name="restaurantlocation" placeholder="Restaurant Location" required>
        <input type="file" id="image" name="image" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>