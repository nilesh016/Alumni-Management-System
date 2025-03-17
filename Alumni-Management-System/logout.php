<?php
// logout.php
session_start();

// Destroy the session
session_destroy();

// Inform the user about logout and redirect
echo "<p class='message'>Logout successful. Redirecting to the main page in 3 seconds...</p>";
header("refresh:3;url=index.php");
exit(); // Ensure script stops execution after sending the header
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="css/logout.css">
    <style>
        .message {
            text-align: center;
            font-size: 20px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
</body>
</html>
