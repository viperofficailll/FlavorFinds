<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <div class="header">
        <h1 class="animated fadeInDown hover-effect">FlavorFinds</h1>
        <nav>
            <ul>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contactus.html">Contact</a></li>
                <li><a href="signout.php">Sign Out</a></li>
            </ul>
        </nav>
    </div>

    <!-- Search Bar -->

    <div class="search-bar">
        <form action="home2.php" method="post">
            <input type="text" name="food" placeholder="Search Food Here" id="food" required>
            <br>
            <div class="food-cost-section">
                <h1>Select your desired Cost Range ! </h1>
                <label for="below-1000">Less than Rs.1000</label>
                <input type="radio" name="cost1" id="below-1000" value="below 1000" required>
                <br>
                <label for="above-1000">More than Rs.1000</label>
                <input type="radio" name="cost1" id="above-1000" value="above 1000" required>
            </div>
            <div class="which-food-section">
                <h1> Which type of Food do you want ?</h1>
                <label for="buff">Buff</label>
                <input type="radio" name="variety" id="buff" value="Buff" required>
                <br>
                <label for="chicken">Chicken</label>
                <input type="radio" name="variety" id="chicken" value="Chicken" required>
                <br>
                <label for="veg">Veg</label>
                <input type="radio" name="variety" id="veg" value="Veg" required>
            </div>
            <input type="submit" name="search" value="Search" />
        </form>
    </div>
    

    <!-- Recommended Food -->
    <div class="recommendedfood">
        Recommended Foods
        <?php
        session_start(); // Start the session

        // Check if the user is logged in, otherwise redirect to login page
        if (!isset($_SESSION["email"])) {
            header("Location: login.php");
            exit();
        }

        include 'db_conn.php';

        $location = isset($_SESSION["location"]) ? $_SESSION["location"] : "Unknown";

        $query = "SELECT * FROM recommendedfood WHERE location = '$location'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["foodname1"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $row["foodname2"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $row["foodname3"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $row["foodname4"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $row["foodname5"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

</html>