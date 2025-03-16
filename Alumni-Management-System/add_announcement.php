<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:login.html");
    exit();
}

$userid = $_SESSION['id'];
$username1 = $_SESSION['adname'];

include_once "setting/adminpage_navigation.php";
include_once "connect_database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Announcement - IIT-ISM Alumni</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="css/header_navigationbar.css">
    <link rel="stylesheet" href="css/add_forum_post.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            background: white;
            padding: 20px;
            margin: 50px auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #1a237e;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 18px;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            font-size: 16px;
            font-weight: bold;
            background-color: #050119;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: red;
        }

        .message {
            text-align: center;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
        }

        .success {
            background-color: #4CAF50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Add a New Announcement</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="aid">Announcement ID</label>
            <input type="text" name="aid" id="aid" required>
        </div>

        <div class="form-group">
            <label for="aname">Announcement Name</label>
            <input type="text" name="aname" id="aname" required>
        </div>

        <div class="form-group">
            <label for="adesc">Announcement Description</label>
            <textarea name="adesc" id="adesc" rows="5" required></textarea>
        </div>

        <button class="btn" type="submit" name="addann">Add Announcement</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addann'])) {
        $annid = trim($_POST['aid']);
        $annname = trim($_POST['aname']);
        $anndesc = trim($_POST['adesc']);

        date_default_timezone_set("Asia/Kolkata");
        $anntime = date("Y/m/d h:i:sa");

        if (empty($annid) || empty($annname) || empty($anndesc)) {
            echo "<p class='message error'>⚠️ Incomplete information. No announcement created.</p>";
        } else {
            $sql = "INSERT INTO announcement (ann_id, ann_name, ann_desc, ann_time) 
                    VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $annid, $annname, $anndesc, $anntime);

            if ($stmt->execute()) {
                echo "<p class='message success'>✅ Announcement successfully created!</p>";
                echo "<p class='message'><a href='announcement.php'>📢 Go to Announcements</a></p>";
            } else {
                echo "<p class='message error'>❌ Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        }
    }
    ?>
</div>

</body>
</html>
