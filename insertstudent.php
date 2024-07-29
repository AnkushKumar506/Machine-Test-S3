<?php
$servername = "localhost";
$username = "root"; 
$password = "Password"; 
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $class_division = $_POST['class_division'];
    $roll_number = $_POST['roll_number'];

    $sql = "INSERT INTO students (student_name, class_division, roll_number) VALUES ('$student_name', '$class_division', '$roll_number')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: displaystudents.php");
exit();
?>
