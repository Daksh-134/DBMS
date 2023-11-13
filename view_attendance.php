<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "course_manag";

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}

$student_id = $_SESSION['student_id'];

// Fetch attendance
$attendance_query = "SELECT * FROM attendance WHERE Student_ID = '$student_id'";
$attendance_result = mysqli_query($conn, $attendance_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Attendance</title>
    <link rel="stylesheet" href="style.css" />
    <style>
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #333;
    color: white;
}

tr:hover {
    background-color: aquamarine;
}
    </style>
</head>

<body>
    <header><h1>View Attendance</h1></header>

    <table border="1">
        <tr>
            <th>Attendance ID</th>
            <th>Schedule ID</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($attendance_result)) { ?>
            <tr>
                <td>
                    <?php echo $row['Attendance_ID']; ?>
                </td>
                <td>
                    <?php echo $row['Schedule_ID']; ?>
                </td>
                <td>
                    <?php echo $row['Date']; ?>
                </td>
                <td>
                    <?php echo $row['Status']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>

    <nav class="menu">
        <a href="dashboard.php">Back to Dashboard</a>

        <a href="logout.php">Logout</a>
    </nav>


</body>

</html>