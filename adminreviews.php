<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reviews</title>
    <link rel="stylesheet" href="adminreviews.css">
   
</head>
<body>
    <h2>Reviews</h2>
    <table>
        <tr>
            <th>Hotel ID</th>
            <th>Rating</th>
            <th>Review</th>
            <th>User</th>
        </tr>
        <?php
            include 'db_conn.php';
            $sql = "SELECT * FROM `reviews`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["ratings"] . "</td>";
                    echo "<td>" . $row["review"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No reviews found.</td></tr>";
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
</body>
</html>