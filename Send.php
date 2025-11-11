<?php
// Database configuration
$servername = "localhost";
$username = "Stephen"; 
$password = "M@rtyr18"; 
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO olamide (Surname, FName, Mname, Mnum, Dept, Sex, Age) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssssss", $Surname, $FName, $Mname, $Mnum, $Dept, $Sex, $Age);

    // Set parameters from POST data
    $Surname = $_POST['Surname'] ?? '';
    $FName = $_POST['FName'] ?? '';
    $Mname = $_POST['Mname'] ?? '';
    $Mnum = $_POST['Mnum'] ?? '';
    $Dept = $_POST['Dept'] ?? '';
    $Sex = $_POST['Sex'] ?? '';
    $Age = $_POST['Age'] ?? '';

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record added successfully";
        header("Location: db.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>