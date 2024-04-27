<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
    $location = isset($_POST['location']) ? $_POST['location'] : '';

    $food_names = [];
    $upload_errors = [];

    // Process file uploads
    for ($i = 1; $i <= 5; $i++) {
        $file_name = $_FILES["image{$i}"]['name'];
        $temp_name = $_FILES["image{$i}"]['tmp_name'];
        $folder = 'images/' . $file_name;

        if (move_uploaded_file($temp_name, $folder)) {
            $food_names[] = $file_name;
        } else {
            $upload_errors[] = "File upload {$i} failed";
        }
    }

    // Insert data into the database after processing file uploads
    if (empty($upload_errors)) {
        $insert_query = "INSERT INTO `recommendedfood`(`location`, `foodname1`, `foodname2`, `foodname3`, `foodname4`, `foodname5`)
        VALUES ('$location', '{$food_names[0]}', '{$food_names[1]}', '{$food_names[2]}', '{$food_names[3]}', '{$food_names[4]}')";

        // Execute the insert query
        mysqli_query($conn, $insert_query);
        
        echo "Data inserted successfully";
    } else {
        foreach ($upload_errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminaddlocation.css">
</head>
<body>
    <h2>Insert Images Here </h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="location" placeholder="Enter location">
        <br><br>
        <label for="image1">Food Image 1:</label>
        <input type="file" name="image1" id="image1">
        <br>
        <label for="image2">Food Image 2:</label>
        <input type="file" name="image2" id="image2">
        <br>
        <label for="image3">Food Image 3:</label>
        <input type="file" name="image3" id="image3">
        <br>
        <label for="image4">Food Image 4:</label>
        <input type="file" name="image4" id="image4">
        <br>
        <label for="image5">Food Image 5:</label>
        <input type="file" name="image5" id="image5">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
</body>
</html>
