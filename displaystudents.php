<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>
    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Class and Division</th>
            <th>Roll Number</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['student_name'] . "</td>
                    <td>" . $row['class_division'] . "</td>
                    <td>" . $row['roll_number'] . "</td>
                    <td>
                        <a href='editstudent.php?id=" . $row['id'] . "'>Edit</a>
                        <a href='deletestudent.php?id=" . $row['id'] . "'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No students found</td></tr>";
        }
        ?>
    </table>
    <a href="addstudent.php">Add New Student</a>
</body>
</html>

<?php
$conn->close();
?>
