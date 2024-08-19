<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venues</title>
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

    <!--Add a canvas for the chart-->
    <div>
        <canvas id="venueChart" style="display: block; max-width: 1000px; margin: 0 auto;"></canvas>
    </div>

    <div class="container">
        <div class="sort-by">
            <label for="sort">Sort by:</label>
            <select id="sort">
                <option value="capacityAsc">Capacity (Ascending)</option>
                <option value="capacityDesc">Capacity (Descending)</option>
                <option value="weekendPriceAsc">Weekend Price (Ascending)</option>
                <option value="weekendPriceDesc">Weekend Price (Descending)</option>
                <option value="weekdayPriceAsc">Weekday Price (Ascending)</option>
                <option value="weekdayPriceDesc">Weekday Price (Descending)</option>
                <option value="averageScoreAsc">Average Score (Ascending)</option>
                <option value="averageScoreDesc">Average Score (Descending)</option>
                <option value="nameAsc">Name (A-Z)</option>
                <option value="nameDesc">Name (Z-A)</option>
            </select>
        </div>


        <section class="accommodation central-plaza">
            <h2>Central Plaza</h2>
            <p><strong>Capacity:</strong> 200</p>
            <p><strong>Weekend Price:</strong> £2000</p>
            <p><strong>Weekday Price:</strong> £1750</p>
            <p><strong>Location:</strong> London</p>
            <p><strong>Average Score:</strong> 7.63</p>
        </section>

        <section class="accommodation pacific-towers-hotel">
            <h2>Pacific Towers Hotel</h2>
            <p><strong>Capacity:</strong> 250</p>
            <p><strong>Weekend Price:</strong> £3000</p>
            <p><strong>Weekday Price:</strong> £2400</p>
            <p><strong>Location:</strong> Birmingham</p>
            <p><strong>Average Score:</strong> 5.1</p>
        </section>

        <section class="accommodation sky-center-complex">
            <h2>Sky Center Complex</h2>
            <p><strong>Capacity:</strong> 100</p>
            <p><strong>Weekend Price:</strong> £2500</p>
            <p><strong>Weekday Price:</strong> £1900</p>
            <p><strong>Location:</strong> Loughborough</p>
            <p><strong>Average Score:</strong> 7.02</p>
        </section>

        <section class="accommodation sea-view-tavern">
            <h2>Sea View Tavern</h2>
            <p><strong>Capacity:</strong> 300</p>
            <p><strong>Weekend Price:</strong> £2200</p>
            <p><strong>Weekday Price:</strong> £2000</p>
            <p><strong>Location:</strong> Nottingham</p>
            <p><strong>Average Score:</strong> 6.5</p>
        </section>

        <section class="accommodation ashby-castle">
            <h2>Ashby Castle</h2>
            <p><strong>Capacity:</strong> 1000</p>
            <p><strong>Weekend Price:</strong> £8000</p>
            <p><strong>Weekday Price:</strong> £7000</p>
            <p><strong>Location:</strong> Manchester</p>
            <p><strong>Average Score:</strong> 9.14</p>
        </section>

        <section class="accommodation fawlty-towers">
            <h2>Fawlty Towers</h2>
            <p><strong>Capacity:</strong> 50</p>
            <p><strong>Weekend Price:</strong> £600</p>
            <p><strong>Weekday Price:</strong> £400</p>
            <p><strong>Location:</strong> York</p>
            <p><strong>Average Score:</strong> 6.04</p>
        </section>

        <section class="accommodation hilltop-mansion">
            <h2>Hilltop Mansion</h2>
            <p><strong>Capacity:</strong> 120</p>
            <p><strong>Weekend Price:</strong> £3000</p>
            <p><strong>Weekday Price:</strong> £2200</p>
            <p><strong>Location:</strong> Liverpool</p>
            <p><strong>Average Score:</strong> 4.77</p>
        </section>

        <section class="accommodation haslegrave-hotel">
            <h2>Haslegrave Hotel</h2>
            <p><strong>Capacity:</strong> 200</p>
            <p><strong>Weekend Price:</strong> £2000</p>
            <p><strong>Weekday Price:</strong> £1500</p>
            <p><strong>Location:</strong> Bristol</p>
            <p><strong>Average Score:</strong> 8.79</p>
        </section>

        <section class="accommodation forest-inn">
            <h2>Forest Inn</h2>
            <p><strong>Capacity:</strong> 260</p>
            <p><strong>Weekend Price:</strong> £1800</p>
            <p><strong>Weekday Price:</strong> £1600</p>
            <p><strong>Location:</strong> Brighton</p>
            <p><strong>Average Score:</strong> 7.47</p>
        </section>

        <section class="accommodation southwestern-estate">
            <h2>Southwestern Estate</h2>
            <p><strong>Capacity:</strong> 500</p>
            <p><strong>Weekend Price:</strong> £4000</p>
            <p><strong>Weekday Price:</strong> £3000</p>
            <p><strong>Location:</strong> London</p>
            <p><strong>Average Score:</strong> 8.51</p>
        </section>
    </div>

    <footer>
        &copy; 2024 LoughWeddings. All rights reserved.
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="script.js"></script>
    <script src="graph.js"></script>

</body>
</html>
