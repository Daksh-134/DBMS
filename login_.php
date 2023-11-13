<?php
session_start();
include("db_connection.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students WHERE Student_ID = '$student_id' AND Password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['student_id'] = $student_id;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Student ID or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
</body>
</html>
