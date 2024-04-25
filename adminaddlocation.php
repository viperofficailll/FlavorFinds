<!DOCTYPE html>
<html>
<head>
    <title>Recommended Food Form</title>
    <link rel="stylesheet" href="adminaddlocation.css">
</head>
<body>

<h2>Recommended Food Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Location: <input type="text" name="location"><br>
    Food 1: <input type="text" name="foodname1"><br>
    Food 2: <input type="text" name="foodname2"><br>
    Food 3: <input type="text" name="foodname3"><br>
    Food 4: <input type="text" name="foodname4"><br>
    Food 5: <input type="text" name="foodname5"><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "falvorfinds";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $location = $_POST['location'];
    $foodname1 = $_POST['foodname1'];
    $foodname2 = $_POST['foodname2'];
    $foodname3 = $_POST['foodname3'];
    $foodname4 = $_POST['foodname4'];
    $foodname5 = $_POST['foodname5'];

    // Insert data into MySQL database
    $sql = "INSERT INTO recommendedfood (location, foodname1, foodname2, foodname3, foodname4, foodname5) VALUES ('$location', '$foodname1', '$foodname2', '$foodname3', '$foodname4', '$foodname5')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
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