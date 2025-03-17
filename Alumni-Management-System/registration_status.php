<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "connect_database.php"; // Ensure database connection is included
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/registration_login_status.css">
</head>
<body>

<div class="status_wrapper">
    <div class="status_container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
            // Fetch and sanitize form data
            $name = trim($_POST['pi_name']);
            $gender = trim($_POST['pi_gender']);
            $registration = trim($_POST['pi_register']);
            $branch = trim($_POST['pi_branch']);
            $sessiona = trim($_POST['pi_session']);
            $email = trim($_POST['pi_email']);
            $mobile = trim($_POST['pi_mobile']);
            $password = trim($_POST['pi_password']);
            $course = trim($_POST['pi_course']);

            // Check for empty fields
            if (empty($name) || empty($gender) || empty($registration) || empty($branch) || empty($sessiona) || empty($email) || empty($mobile) || empty($password) || empty($course)) {
                echo "<h1 class='error'>Incomplete Information</h1>";
                echo "<p>Please fill in all required fields and try again.</p>";
                echo "<p>Redirecting you back in <span id='countdown'>10</span> seconds...</p>";
                echo "<p>Or click <a href='register.html'>here</a> to return now.</p>";
                echo "<script>setTimeout(() => { window.location.href = 'register.html'; }, 10000);</script>";
            } else {
                $al_status = "Not Approved";
                $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Secure password hashing

                // Insert into `alumnimember`
                $register_sql = "INSERT INTO alumnimember (pi_register, al_password, al_status) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($register_sql);
                $stmt->bind_param("sss", $registration, $hashed_password, $al_status);

                if ($stmt->execute()) {
                    // Insert into `alumniinfo`
                    $info_sql = "INSERT INTO alumniinfo (pi_name, pi_gender, pi_register, pi_branch, pi_session, pi_email, pi_mobile, pi_course) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt2 = $conn->prepare($info_sql);
                    $stmt2->bind_param("ssssssss", $name, $gender, $registration, $branch, $sessiona, $email, $mobile, $course);
                    
                    if ($stmt2->execute()) {
                        echo "<h1 class='success'>Registration Successful!</h1>";
                        echo "<p>Welcome, <strong>" . htmlspecialchars($name) . "</strong>. Your account has been created successfully.</p>";
                        echo "<p>Redirecting you to the login page in <span id='countdown'>5</span> seconds...</p>";
                        echo "<p>Or click <a href='login.html'>here</a> to login now.</p>";
                        echo "<script>setTimeout(() => { window.location.href = 'login.html'; }, 5000);</script>";
                    } else {
                        echo "<h1 class='error'>Error!</h1>";
                        echo "<p>Failed to insert into alumniinfo. Please try again.</p>";
                        echo "<p>Error: " . htmlspecialchars($stmt2->error) . "</p>";
                        echo "<p>Redirecting in <span id='countdown'>10</span> seconds...</p>";
                        echo "<script>setTimeout(() => { window.location.href = 'register.html'; }, 10000);</script>";
                    }
                } else {
                    echo "<h1 class='error'>Registration Failed!</h1>";
                    echo "<p>There was an error processing your registration.</p>";
                    echo "<p>Error: " . htmlspecialchars($stmt->error) . "</p>";
                    echo "<p>Redirecting back to the registration page in <span id='countdown'>10</span> seconds...</p>";
                    echo "<p>Or click <a href='register.html'>here</a> to try again.</p>";
                    echo "<script>setTimeout(() => { window.location.href = 'register.html'; }, 10000);</script>";
                }
            }
        } else {
            echo "<h1 class='error'>Unauthorized Access</h1>";
            echo "<p>You cannot access this page directly.</p>";
            echo "<p>Redirecting to the home page in <span id='countdown'>5</span> seconds...</p>";
            echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 5000);</script>";
        }
        ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let countdownElement = document.getElementById('countdown');
        if (countdownElement) {
            let timeLeft = parseInt(countdownElement.innerText);
            let interval = setInterval(() => {
                timeLeft--;
                countdownElement.innerText = timeLeft;
                if (timeLeft <= 0) clearInterval(interval);
            }, 1000);
        }
    });
</script>

</body>
</html>

