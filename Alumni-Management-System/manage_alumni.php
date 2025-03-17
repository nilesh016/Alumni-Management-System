<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: login.html");
    exit(); // Ensures the script stops execution after redirection
}

$userid = $_SESSION['id'] ?? '';  // Added null coalescing operator to avoid warnings
$username1 = $_SESSION['adname'] ?? ''; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Alumni</title>
    <link rel="stylesheet" href="css/header_navigationbar.css"">
    
    <?php include_once "setting/adminpage_navigation.php"; ?>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            padding-left: 100px;
            color: #333;
        }

        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #050119;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #ddd;
            cursor: pointer;
        }

        th:hover {
            background-color: #bbb;
        }

        #button1 {
            padding: 5px 20px;
            background-color: #F9E79F;
            color: black;
            border: 2px solid #FEF9E7;
            cursor: pointer;
        }

        .approve-link {
            display: block;
            text-align: right;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

<?php include_once "connect_database.php"; ?>

<h1>View Alumni Membership</h1>
<table id="alumni">
    <thead>
        <tr>
            <th>NO</th>
            <th>Alumni Registration Number</th>
            <th onclick="sortTable(2)">Alumni Name</th>
            <th onclick="sortTable(3)">Approval Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT alumnimember.pi_register, alumniinfo.pi_name, alumnimember.al_status 
                FROM alumnimember 
                INNER JOIN alumniinfo 
                ON alumniinfo.pi_register = alumnimember.pi_register";

        $result = $conn->query($sql);
        $no = 1;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['pi_register']) . "</td>";
            echo "<td>" . htmlspecialchars($row['pi_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['al_status']) . "</td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

<div class="approve-link">
    <a href="approve.php">Approve Membership</a>
</div>

<script>
function sortTable(n) {
    let table = document.getElementById("alumni");
    let rows = Array.from(table.rows).slice(1); // Exclude header row
    let ascending = true;

    rows.sort((rowA, rowB) => {
        let cellA = rowA.cells[n].innerText.toLowerCase();
        let cellB = rowB.cells[n].innerText.toLowerCase();
        
        return ascending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
    });

    ascending = !ascending; // Toggle sorting order

    rows.forEach(row => table.appendChild(row)); // Reorder rows in DOM
}
</script>

</body>
</html>
