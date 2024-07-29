<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form action="insertstudent.php" method="post">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br>

        <label for="class_division">Class and Division:</label>
        <input type="text" id="class_division" name="class_division" required><br>

        <label for="roll_number">Roll Number:</label>
        <input type="number" id="roll_number" name="roll_number" required><br>

        <button type="submit">Submit</button>
    </form>
    <a href="displaystudents.php">View Students</a>
</body>
</html>
