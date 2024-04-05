<!DOCTYPE html>
<html>
<head>
    <title>Insert Restaurant Data</title>
</head>
<body>
    <h2>Insert Restaurant Data</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        Restaurant ID: <input type="text" name="restaurantid"><br><br>
        Restaurant Name: <input type="text" name="restaurantname"><br><br>
        Food It Serves: <input type="text" name="foodItServes"><br><br>
        Restaurant Location: <input type="text" name="restaurantlocation"><br><br>
        Restaurant Image: <input type="file" name="restarantimage"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database credentials
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flavorfinds";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO restaurant (restaurantid, restaurantname, foodItServes, restaurantlocation, restarantimage) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $restaurantid, $restaurantname, $foodItServes, $restaurantlocation, $restarantimage);

        // Set parameters
        $restaurantid = $_POST["restaurantid"];
        $restaurantname = $_POST["restaurantname"];
        $foodItServes = $_POST["foodItServes"];
        $restaurantlocation = $_POST["restaurantlocation"];

        // File upload handling
        if ($_FILES["restarantimage"]["error"] == UPLOAD_ERR_OK) {
            $file_tmp = $_FILES["restarantimage"]["tmp_name"];

            // Read the file as binary data
            $restarantimage = file_get_contents($file_tmp);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record inserted successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error uploading file.";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
