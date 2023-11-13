<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="header-div">
        <header class="header">
            <hr style="width:80%">
            <a href="index.html">Home</a>
        </header>
        <center>
            <nav class="menu">
                <a href="add_grade.html">Add Grade</a>
                <a href="add_attendance.html">Add Attendance</a>
            </nav>
            <div class="welcome-message">
                <?php
                // Check if the name parameter is set in the URL
                if (isset($_GET["name"])) {
                    $name = $_GET["name"];
                    echo "<h1>Welcome, $name!</h1>";
                } else {
                    echo "<p>Invalid access to this page.</p>";
                }
                ?>
            </div>
        </center>
    </div>

    <div class="container">
        <div class="Homepage-img">

        </div>
        <div class='content'>
            <h3>You can access any information regarding student attendance and grades.</h3>
        </div>
    </div>
</body>

</html>