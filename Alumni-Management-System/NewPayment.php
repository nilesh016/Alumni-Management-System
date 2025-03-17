<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:login.html");
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
    <title>Financial Record - New Payment</title>
    
    <link rel="stylesheet" href="css/header_navigationbar.css" />
    <link rel="stylesheet" href="css/add_forum_post.css"/>
    
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            font-size: 16px;
        }

        .dropbtn {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 2px solid #050119;
            background-color: cornsilk;
            cursor: pointer;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        .submit-btn:hover {
            background: #218838;
        }
    </style>
</head>

<body>

<h1>Financial Record - New Payment</h1>

<form action="" method="post">
    <table align="center" cellspacing="10">
        <tr>
            <th align="left">Payment ID:</th>
            <td><input class="input-field" type="text" name="pid" required></td>
        </tr>
        <tr>
            <th align="left">Alumni Registration Number:</th>
            <td><input class="input-field" type="text" name="aid" required></td>
        </tr>
        <tr>
            <th align="left">Payment Purpose:</th>
            <td>
                <select class="dropbtn" name="pp" required>
                    <option value="Yearly Membership">Yearly Membership</option>
                    <option value="Life-time Membership">Life-time Membership</option>
                    <option value="Cash Donation">Cash Donation</option>
                    <option value="Registration Fee">Registration Fee</option>
                </select>
            </td>
        </tr>
        <tr>
            <th align="left">Payment Date:</th>
            <td><input class="input-field" type="date" name="pd" required></td>
        </tr>
        <tr>
            <th align="left">Payment Amount:</th>
            <td><input class="input-field" type="text" name="pa" required></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <button type="submit" name="addpayment" class="submit-btn">Add Payment</button>
            </td>
        </tr>
    </table>
</form>

<?php
include_once "connect_database.php";

if (isset($_POST['addpayment'])) {
    $paymentid = $_POST['pid'];
    $paymentpurpose = $_POST['pp'];
    $paymentdate = $_POST['pd'];
    $paymentpaid = $_POST['pa'];
    $alid = $_POST['aid'];

    if (empty($paymentid) || empty($paymentpurpose) || empty($paymentdate) || empty($paymentpaid) || empty($alid)) {
        echo "<p style='text-align:center; color: red;'>*****Incomplete information. No payment inserted.*****</p>";
    } else {
        // Use prepared statements to prevent SQL injection
        $sql1 = $conn->prepare("INSERT INTO financialdata (payment_id, total_payment, payment_purpose, payment_date, pi_register) 
                                VALUES (?, ?, ?, ?, ?)");
        
        $sql1->bind_param("sssss", $paymentid, $paymentpaid, $paymentpurpose, $paymentdate, $alid);

        if ($sql1->execute()) {
            echo "<p style='text-align:center; color: green;'>*****Payment successfully inserted.*****</p>";
            echo "<p style='text-align:center;'><a href='Financial_Record.php'>Go to Financial Record</a></p>";
        } else {
            echo "<p style='text-align:center; color: red;'>Error: " . $sql1->error . "</p>";
        }

        $sql1->close();
    }
}

$conn->close();
?>

</body>
</html>
