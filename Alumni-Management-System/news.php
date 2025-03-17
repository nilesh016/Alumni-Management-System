<?php
include_once "connect_database.php";
include_once "setting/news_navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="css/n3.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #050119;
            color: white;
        }

        .np1 {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="container">

    <!-- Announcements Section -->
    <h2 class="np1">Announcements</h2>
    
    <?php
    $sql = "SELECT * FROM announcement ORDER BY ann_time DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='tb1'>";
        echo "<tr>
                <th>ANNOUNCEMENTS</th>
                <th>DESCRIPTION</th>
                <th>TIME</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["ann_name"]) . "</td>
                    <td>" . htmlspecialchars($row["ann_desc"]) . "</td>
                    <td>" . htmlspecialchars($row["ann_time"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No announcements available</p>";
    }
    ?>

    <hr color="#050119" size="4"/>

    <!-- Events Section -->
    <h2 class="np1">Events</h2>
    
    <?php
    $sql2 = "SELECT * FROM event ORDER BY e_date, e_time";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        echo "<table class='tb1'>";
        echo "<tr>
                <th>EVENT</th>
                <th>DATE</th>
                <th>TIME</th>
                <th>VENUE</th>
                <th>DESCRIPTION</th>
              </tr>";

        while ($row = $result2->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["e_name"]) . "</td>
                    <td>" . htmlspecialchars($row["e_date"]) . "</td>
                    <td>" . htmlspecialchars($row["e_time"]) . "</td>
                    <td>" . htmlspecialchars($row["e_venue"]) . "</td>
                    <td>" . htmlspecialchars($row["e_desc"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No events available</p>";
    }
    ?>

</div>
</body>
</html>
