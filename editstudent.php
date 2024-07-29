<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $class_division = $_POST['class_division'];
    $roll_number = $_POST['roll_number'];

    $sql = "UPDATE students SET student_name='$student_name', class_division='$class_division', roll_number='$roll_number' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: displaystudents.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="editstudent.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" value="<?php echo $row['student_name']; ?>" required><br>

        <label for="class_division">Class and Division:</label>
        <input type="text" id="class_division" name="class_division" value="<?php echo $row['class_division']; ?>" required><br>

        <label for="roll_number">Roll Number:</label>
        <input type="number" id="roll_number" name="roll_number" value="<?php echo $row['roll_number']; ?>" required><br>

        <button type="submit">Update Student</button>
    </form>
    <a href="displaystudents.php">Cancel</a>
</body>
</html>
