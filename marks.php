<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Insert marks
if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $query = "INSERT INTO marks (student_name, subject, marks) 
              VALUES ('$name', '$subject', '$marks')";
    mysqli_query($conn, $query);
}

// Fetch marks
$query = "SELECT * FROM marks";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Marks System</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body { font-family: Arial; text-align: center; }
        input, select, button { padding: 10px; margin: 5px; }
        table { margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid black; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>

<h2>Marks System 📝</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Student Name" required><br><br>
    <input type="text" name="subject" placeholder="Subject" required><br><br>
    <input type="number" name="marks" placeholder="Marks" required><br><br>

    <button type="submit" name="add">Add Marks</button>
</form>

<br><br>

<h3>Marks Records 📊</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Marks</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['student_name']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['marks']; ?></td>
        <td>
            <a href="edit_marks.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete_marks.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>

</table>

<br><br>
<a href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>