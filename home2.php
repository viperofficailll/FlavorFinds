<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        body {
            background-image: url('testbg.jpg');
            /* Add background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
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

    include 'db_conn.php';

    if (isset($_POST['search'])) {
        $FoodName = $_POST['food'];
        $FoodCost = $_POST['cost1'];
        $FoodVariety = $_POST['variety'];

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM `searchfood` WHERE foodname = ? AND price = ? AND variety = ? AND location = ? ORDER BY `ratings` DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $FoodName, $FoodCost, $FoodVariety, $location);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Restaurant ID</th><th>Restaurant Name</th><th>RATING</th><th>IMAGE</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $restaurantName = urlencode($row["restaurantid"]); // Encode the restaurant id for use in the URL
                echo '<tr><td>' . $row["restaurantid"] . '</td><td><a href="restaurant.php?id=' . $restaurantName . '">' . $row["restaurant"] . '</a></td><td>'
                    . $row["ratings"] . '</td><td><img src="data:image/jpeg;base64,' . base64_encode($row["IMAGE"]) . '"></td></tr>';
            }
            echo "</table>";
        } else {
            echo "No restaurant found";
        }

        $stmt->close();
    } else {
        echo "No search query submitted";
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