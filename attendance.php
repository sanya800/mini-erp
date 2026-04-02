<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Insert attendance
if(isset($_POST['mark'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $query = "INSERT INTO attendance (student_name, date, status) 
              VALUES ('$name', '$date', '$status')";
    mysqli_query($conn, $query);
}

// Fetch attendance
$query = "SELECT * FROM attendance";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Attendance System 📊</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Student Name" required><br><br>
    <input type="date" name="date" required><br><br>

    <select name="status">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
    </select><br><br>

    <button type="submit" name="mark">Mark Attendance</button>
</form>

<br><br>

<h3>Attendance Records 📋</h3>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['student_name']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
           <a href="edit_attendance.php?id=<?php echo $row['id']; ?>">Edit</a> |
<a href="delete_attendance.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
<br><br>
<a href="dashboard.php">Back</a>

</body>
</html>