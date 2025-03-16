<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("location:login.html");
	exit();
} else {
	$userid = $_SESSION['id'];
	$username1 = $_SESSION['adname'];
	$alusername = $_SESSION['alname'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/update_profile.css">

    <script>
        function updateSessionOptions() {
            let course = document.getElementById("course").value;
            let sessionSelect = document.getElementById("session");
            sessionSelect.innerHTML = ""; // Clear previous options

            let startYear = 2005;
            let endYear = new Date().getFullYear();

            for (let year = startYear; year <= endYear; year++) {
                let option = document.createElement("option");
                if (course === "B.Tech") {
                    option.text = `${year}-${year + 3}`;
                } else if (course === "M.Tech") {
                    option.text = `${year}-${year + 1}`;
                } else if (course === "Integrated M.Tech") {
                    option.text = `${year}-${year + 4}`;
                }
                sessionSelect.add(option);
            }
        }
    </script>

</head>

<body>

<?php 
include_once "connect_database.php";
include_once "setting/updateprofile_navigation.php";
?>

<!-- Profile Update Container -->
<div class="profile-container">
    <h2>Update Your Profile</h2>

    <form method="post" enctype="multipart/form-data" class="profile-form">
        <div class="form-group">
            <label>Address:</label>
            <textarea name="address" cols="40" rows="3" placeholder="Enter your address"></textarea>
        </div>

        <div class="form-group">
            <label>Mobile Number:</label>
            <input type="text" name="contact" maxlength="10" pattern="[0-9]{10}" placeholder="Enter mobile number" required>
        </div>

        <div class="form-group">
            <label>Company:</label>
            <input type="text" name="comp" placeholder="Enter your company name">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label>Course:</label>
            <select name="course" id="course" onchange="updateSessionOptions()">
                <option value="B.Tech">B.Tech (4 Years)</option>
                <option value="M.Tech">M.Tech (2 Years)</option>
                <option value="Integrated M.Tech">Integrated M.Tech (5 Years)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Session:</label>
            <select name="batch" id="session">
                <!-- Dynamically populated -->
            </select>
        </div>

        <div class="form-group">
            <label>Branch:</label>
            <select name="prog">
                <option value="">Select Branch</option>
                <option>CSE</option>
                <option>ECE</option>
                <option>EE</option>
                <option>AIEI</option>
                <option>FT</option>
                <option>MECH</option>
                <option>IT</option>
            </select>
        </div>

        <div class="form-group">
            <label>Profile Picture:</label>
            <input type="file" name="pp">
        </div>

        <div class="form-group">
            <button type="submit" name="update" class="update-btn">Update Profile</button>
        </div>
    </form>
</div>

<?php
if(isset($_POST['update'])) {
	$address = $_REQUEST['address'];
	$contact = $_REQUEST['contact'];
	$email = $_REQUEST['email'];
	$batch = $_REQUEST['batch'];
	$prog = $_REQUEST['prog'];
	$comp = $_REQUEST['comp'];
	$course = $_REQUEST['course'];
	$pp = !empty($_FILES['pp']['tmp_name']) ? addslashes(file_get_contents($_FILES['pp']['tmp_name'])) : null;

	if(empty($address) && empty($contact) && empty($comp) && empty($email) && empty($batch) && empty($prog) && empty($pp)) {
		echo "<script>alert('Empty field. No update made.');</script>";		
	} else {
		$updateSuccess = false;

		if(!empty($address)) {
			$conn->query("UPDATE alumniinfo SET pi_address='$address' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($contact)) {
			$conn->query("UPDATE alumniinfo SET pi_mobile='$contact' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($email)) {
			$conn->query("UPDATE alumniinfo SET pi_email='$email' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($batch)) {
			$conn->query("UPDATE alumniinfo SET pi_session='$batch' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($prog)) {
			$conn->query("UPDATE alumniinfo SET pi_branch='$prog' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($pp)) {
			$conn->query("UPDATE alumniinfo SET pi_picture='$pp' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($comp)) {
			$conn->query("UPDATE alumniinfo SET pi_company='$comp' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}
		if(!empty($course)) {
			$conn->query("UPDATE alumniinfo SET pi_course='$course' WHERE pi_register='$userid'");
			$updateSuccess = true;
		}

		if($updateSuccess) {
			echo "<script>alert('Profile updated successfully!');</script>";
		} else {
			echo "<script>alert('Update failed. Please try again.');</script>";
		}
	}
}
?>

<script>
    window.onload = updateSessionOptions; // Set initial session options based on default course selection
</script>

</body>
</html>
