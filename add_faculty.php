<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Handle form submission and database operation here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $facultyName = $_POST["facultyName"];
    $contact = $_POST["contact"];
    $department = $_POST["department"];
    $officeLocation = $_POST["officeLocation"];
    $password = $_POST["password"];

    // Perform database operation
    // Adjust the following lines based on your actual database operations
    $conn = new mysqli("localhost", "root", "", "course_manag");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO faculty (facultyName, contact, department, officeLocation, password)
    VALUES ('$facultyName', '$contact', '$department', '$officeLocation', '$password')";

    $response = array();

    if ($conn->query($sql) === TRUE) {
        $response["status"] = "success";
        $response["message"] = "Faculty added successfully!";
    } else {
        $response["status"] = "error";
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Debugging statement - remove or comment out in production
    // var_dump($response);

    echo json_encode($response);

    $conn->close();
}
?>