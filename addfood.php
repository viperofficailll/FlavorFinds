<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;
    
    if (move_uploaded_file($tempname, $folder)) {
        echo ("File uploaded successfully");
    } else {
        echo ("File upload failed");
    }
    $name =$_POST['value1'];
    $price =$_POST['value2'];
    $variety =$_POST['value3'];
    $id =$_POST['value4'];
    $resname =$_POST['value5'];
    $location =$_POST['value6'];
    $numReviews =$_POST['value7'];
    $ratings=$_POST['value8'];
  
    $insert_query = "INSERT INTO `searchfood`(`foodname`, `price`, `variety`, `restaurantid`, `restaurant`, `ratings`, `IMAGE`, `location`, `num_reviews`)
    VALUES ('$name','$price','$variety','$id','$resname','$ratings','$file_name','$location','$numReviews')";
    // Execute the insert query
    mysqli_query($conn, $insert_query);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addfood.css">
</head>
<body>
<h2>Add Food for a Restaurant</h2>
<form action="" method="post" enctype="multipart/form-data">
    
       

        <input type="text" name="value1" placeholder="Enter Food Name" >
        <input type="text" name="value2" placeholder="Enter Food Price" >
        <input type="text" name="value3" placeholder="Enter Variety" >
        <input type="text" name="value4" placeholder="Enter Restauramt ID" >
        <input type="text" name="value5" placeholder="Enter Restaurant Name" >
        <input type="text" name="value8" placeholder="Enter Restaurant Rating" >
        
        <input type="text" name="value6" placeholder="Enter Location" >
        <input type="text" name="value7" placeholder="Enter Number of Reviews" >
         Choose Food Image :<input type="file" name="image"></input>

        
        <input type="submit" name="submit" value="Submit"></input>
    </form>
    <br>
    <br>
    <br>
  
</body>
</html>