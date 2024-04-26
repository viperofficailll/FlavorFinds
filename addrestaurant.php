<?php
include 'db_conn.php';

if (isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'images/' . $file_name;
    
    $restaurantname = $_POST['value2'];
    $foodItServes = $_POST['value3'];
    $restaurantlocation = $_POST['value4'];

    if (move_uploaded_file($tempname, $folder)) {
        $insert_query = mysqli_query($conn, "INSERT INTO `restaurant`( `restaurantname`, `foodItServes`, `restaurantlocation`, `restarantimage`)
        VALUES ('$restaurantname', '$foodItServes', '$restaurantlocation', '$file_name')");
        
        if ($insert_query) {
            echo "Data inserted successfully";
        } else {
            echo "Data insertion failed";
        }
    } else {
        echo "File upload failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        choose restaurant image :<input type="file" name="image"></input>
        
        <input type="text" name="value2" placeholder="enter restaurant name" >
        <input type="text" name="value3" placeholder="enter food it serves" >
        <input type="text" name="value4" placeholder="enter restaurant location" >
        
        <input type="submit" name="submit" value="Submit"></input>
    </form>
    
</body>

</html>