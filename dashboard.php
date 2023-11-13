<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['Student_Name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" />
</head>



<body>
    <header>
        <h1>Welcome, Student
            <?php echo $student_id; ?>
            <?php echo $student_name; ?>
        </h1>
    </header>
    <div class="Dashboard">
       <h2>Dashboard Options:</h2>
    </div>
    <center>
        <nav class="menu">
            <a href="view_grades.php">View Grade</a>
            <a href="view_attendance.php">View Attendance</a>
            <a href="logout.php">Logout</a>
        </nav>
        <div class="welcome-message">

        </div>
    </center>


</body>

</html>