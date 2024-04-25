
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Information</title>
    <link rel="stylesheet" href="adminrestaurant.css">


</head>
<body>
    <h2>Restaurant Information</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Food It Serves</th>
            <th>Location</th>
        </tr>
        <?php
            include 'db_conn.php';
            $sql = "SELECT * FROM `restaurant`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["restaurantid"] . "</td>";
                    echo "<td>" . $row["restaurantname"] . "</td>";
                    echo "<td>" . $row["foodItServes"] . "</td>";
                    echo "<td>" . $row["restaurantlocation"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No restaurants found.</td></tr>";
            }
        ?>
    </table>
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