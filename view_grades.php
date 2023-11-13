<?php
session_start();
// Database connection parameters
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

// Fetch grades
$grades_query = "SELECT g.Grade, c.Course_ID, c.Course_Name
FROM grades g
JOIN enrollment e ON g.Enrollment_ID = e.Enrollment_ID
JOIN courses c ON e.Course_ID = c.Course_ID
WHERE e.Student_ID = '$student_id'";
$grades_result = mysqli_query($conn, $grades_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Grades</title>
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
    <header>
    <h1>View Grades</h1>
    </header>

    <table border="1">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Grade</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($grades_result)) { ?>
            <tr>
                <td>
                    <?php echo $row['Course_ID']; ?>
                </td>
                <td>
                    <?php echo $row['Course_Name']; ?>
                </td>
                <td>
                    <?php echo $row['Grade']; ?>
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