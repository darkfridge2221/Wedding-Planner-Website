<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
    <a href="wedding.php">Home</a>
    <a href="filter.php">Filter</a>
    <a href="venues.php">Venues</a>
    <a href="help.html">Help</a>
</nav>

<div class="container">
    <form id="searchForm" method="post"> <!--Form to input search criteria-->
        <div class="form-group">
            <label for="date">Wedding Date:</label>
            <input type="date" class="form-control" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>" value="<?php echo isset($_POST['date']) ? $_POST['date'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="partySize">Party Size:</label>
            <input type="number" class="form-control" id="partySize" name="partySize" required min="1" step="1" value="<?php echo isset($_POST['partySize']) ? $_POST['partySize'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="cateringGrade">Catering Grade:</label>
            <select class="form-control" id="cateringGrade" name="cateringGrade" required>
                <option value="1" <?php echo (isset($_POST['cateringGrade']) && $_POST['cateringGrade'] == '1') ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo (isset($_POST['cateringGrade']) && $_POST['cateringGrade'] == '2') ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo (isset($_POST['cateringGrade']) && $_POST['cateringGrade'] == '3') ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo (isset($_POST['cateringGrade']) && $_POST['cateringGrade'] == '4') ? 'selected' : ''; ?>>4</option>
                <option value="5" <?php echo (isset($_POST['cateringGrade']) && $_POST['cateringGrade'] == '5') ? 'selected' : ''; ?>>5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning gold-btn">Search</button>
    </form>

    <div>
        <?php
        $servername = "sci-mysql";
        $username = "coa123wuser";
        $password = "grt64dkh!@2FD";
        $dbname = "coa123wdb";

        $conn = new mysqli($servername, $username, $password, $dbname); //Create connection

        if ($conn->connect_error) { //Check connection
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") { //Handle form submission
            $weddingDate = $_POST['date']; //Retrieve user input
            $partySize = $_POST['partySize'];
            $cateringGrade = $_POST['cateringGrade'];

            //Perform database query based on user input
            $sql = "SELECT 
                    v.venue_id, 
                    v.name, 
                    v.capacity, 
                    v.weekend_price, 
                    v.weekday_price, 
                    v.licensed, 
                    v.latitude, 
                    v.longitude,
                    c.cost AS catering_price_per_person,
                    (c.cost * $partySize) AS total_catering_price,
                    CASE 
                        WHEN DAYOFWEEK('$weddingDate') IN (1,7) THEN v.weekend_price + (c.cost * $partySize)  -- Weekend
                        ELSE v.weekday_price + (c.cost * $partySize)  -- Weekday
                    END AS total_price,
                    CASE 
                        WHEN DAYOFWEEK('$weddingDate') IN (1,7) THEN 'Weekend'
                        ELSE 'Weekday'
                    END AS event_type,
                    CASE 
                        WHEN (v.latitude BETWEEN 51.28 AND 51.70) AND (v.longitude BETWEEN -0.56 AND 0.14) THEN 'London'
                        WHEN (v.latitude BETWEEN 52.42 AND 52.56) AND (v.longitude BETWEEN -2.03 AND -1.83) THEN 'Birmingham'
                        WHEN (v.latitude BETWEEN 52.70 AND 52.80) AND (v.longitude BETWEEN -1.25 AND -1.10) THEN 'Loughborough'
                        WHEN (v.latitude BETWEEN 52.88 AND 52.97) AND (v.longitude BETWEEN -1.20 AND -1.10) THEN 'Nottingham'
                        WHEN (v.latitude BETWEEN 53.40 AND 53.52) AND (v.longitude BETWEEN -2.30 AND -2.20) THEN 'Manchester'
                        WHEN (v.latitude BETWEEN 53.92 AND 53.99) AND (v.longitude BETWEEN -1.09 AND -0.99) THEN 'York'
                        WHEN (v.latitude BETWEEN 53.36 AND 53.43) AND (v.longitude BETWEEN -2.99 AND -2.88) THEN 'Liverpool'
                        WHEN (v.latitude BETWEEN 51.41 AND 51.49) AND (v.longitude BETWEEN -2.68 AND -2.55) THEN 'Bristol'
                        WHEN (v.latitude BETWEEN 50.81 AND 50.86) AND (v.longitude BETWEEN -0.17 AND -0.10) THEN 'Brighton'
                        ELSE 'Other'
                    END AS location
                FROM 
                    venue v
                LEFT JOIN 
                    venue_booking vb ON v.venue_id = vb.venue_id AND vb.booking_date = '$weddingDate'
                LEFT JOIN 
                    catering c ON v.venue_id = c.venue_id
                WHERE 
                    vb.venue_id IS NULL
                    AND c.grade = $cateringGrade
                    AND v.capacity >= $partySize";


            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                //Output data as a table
                echo "<div>";
                echo "<table class='container'>";
                echo "<tr><th>Venue Name</th><th>Capacity</th><th>Weekend Price</th><th>Weekday Price</th><th>Catering Price per Person</th><th>Total Catering Price</th><th>Event Type</th><th>Total Price</th><th>Location</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["capacity"] . "</td>";
                    echo "<td>" . $row["weekend_price"] . "</td>";
                    echo "<td>" . $row["weekday_price"] . "</td>";
                    echo "<td>" . $row["catering_price_per_person"] . "</td>";
                    echo "<td>" . $row["total_catering_price"] . "</td>";
                    echo "<td>" . $row["event_type"] . "</td>";
                    echo "<td class='total-price'>" . $row["total_price"] . "</td>";
                    echo "<td>" . $row["location"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<div>No venues found that can accommodate $partySize people with catering grade $cateringGrade on $weddingDate.</div>";
            }
        }

        //Close connection
        $conn->close();
        ?>
    </div>
</div>

<footer>
    &copy; 2024 LoughWeddings. All rights reserved.
</footer>
</body>
</html>
