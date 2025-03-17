<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.html");
    exit();
}

$userid = $_SESSION['id'];
$username1 = $_SESSION['adname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events</title>
    <link rel="stylesheet" href="css/header_navigationbar.css" />

    <?php include_once "setting/adminpage_navigation.php"; ?>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1, h3 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>

<body>

<h1>Manage Events</h1>

<form method="post">
    <h3>Please enter the following information:</h3>
    Event ID: <input type="text" name="event_id" required><br>
    Event Name: <input type="text" name="event_name" required><br>
    Event Date: <input type="date" name="event_date" required><br>
    Event Time: <input type="time" name="event_time" required><br>
    Event Venue: <input type="text" name="event_venue" required><br>
    Event Details: <textarea name="event_desc" rows="4" required></textarea><br>
    
    <button type="submit" name="Insert">Submit</button>
</form>

<?php
include "connect_database.php";

if (isset($_POST['Insert'])) {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_venue = $_POST['event_venue'];
    $event_desc = $_POST['event_desc'];

    // Use prepared statement to prevent SQL injection
    $sql = $conn->prepare("INSERT INTO event (event_id, event_name, event_date, event_time, event_venue, event_desc) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    
    $sql->bind_param("ssssss", $event_id, $event_name, $event_date, $event_time, $event_venue, $event_desc);

    if ($sql->execute()) {
        echo "<p style='text-align:center; color: green;'>Event added successfully!</p>";
    } else {
        echo "<p style='text-align:center; color: red;'>Error: " . $sql->error . "</p>";
    }

    $sql->close();
}

$conn->close();
?>

</body>
</html>
