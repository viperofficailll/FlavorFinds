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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="home.css"> -->
    <title>Home Page</title>
</head>

<body>
    <div class="header">
        <h1 class="animated fadeInDown hover-effect">FlavorFinds</h1>
        <nav>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="signout.php">Sign Out</a></li>
            </ul>
        </nav>
    </div>

    <!-- Search Bar -->

    <div class="search-bar">
        <form action="home2.php" method="post">
            <input type="text" name="food" placeholder="search for food" id="food required">
            <br>
            <h1> food cost</h1>

       below 1000<input type="radio" name="cost1" value="below 1000"required>
       <br>
       above 1000<input type="radio" name="cost1" value="above 1000"required>
       <h1> food specialization</h1>
       buff<input type="radio" name="variety"  value="buff"required>
       <br>
       chicken<input type="radio" name="variety" value="chicken"required>
       <br>
        veg<input type="radio" name="variety"  value="veg"required>
       <br>
      <input type="submit" name="search" value="search food" />
       
    </form>

    </div>

    <!-- //logic for recommended food// -->
    <div class="recommendedfood">
        <?php
        include 'db_conn.php';

        $query = "SELECT * FROM recommendedfood WHERE location = '$location'";
        $result = mysqli_query($conn, $query);


        if (mysqli_num_rows($result) === 1) {
            echo ("<table >");
            while ($row = mysqli_fetch_assoc($result)) {
                echo ("<tr>");
                echo ("<td>" . $row["foodname1"]);
                echo ("</td>");
                echo ("</tr");
                echo ("<tr>");
                echo ("<td>" . $row["foodname2"]);
                echo ("</td>");
                echo ("</tr");
                echo ("<tr>");
                echo ("<td>" . $row["foodname3"]);
                echo ("</td>");
                echo ("</tr");
                echo ("<tr>");
                echo ("<td>" . $row["foodname4"]);
                echo ("</td>");
                echo ("</tr");
                echo ("<tr>");
                echo ("<td>" . $row["foodname5"]);
                echo ("</td>");
                echo ("</tr");
                echo ("<tr>");
                // echo("<td><img src=>").$row["food1image"];echo("</img>");echo("</td>");
                echo ("</tr");
                // $image = $row['food1image'];
                // echo "<img src='$image' >";
                // echo "<br>";




                echo ('</table>');
            }
        } else {
            echo '<p>No recommended food found for this location.</p>';
        }
        ?>
    </div>

   

    <!-- User Button -->
    <button class="user-button" onclick="location.href='user_profile.php'">
        <?php
        // Assuming you have the user's email stored in a session variable
        if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } else {
            echo "User";
        }
        ?>
    </button>

</body>

</html>