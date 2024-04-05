<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reviews</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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
</body>
</html>
