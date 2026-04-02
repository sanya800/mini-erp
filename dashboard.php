<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Welcome to Dashboard 🎉</h1>

<p>You are logged in as: <?php echo $_SESSION['user']; ?></p>

<br>

<!-- Student Panel -->
<a href="student.php">Go to Student Panel</a><br><br>
<a href="attendance.php">📊 Attendance</a><br><br>
<a href="marks.php">📝 Marks</a><br><br>

<!-- Admin Panel (only visible to admin) -->
<?php if($_SESSION['role'] == 'admin') { ?>
    <a href="admin.php">Go to Admin Panel</a><br><br>
<?php } ?>

<!-- Logout -->
<a href="logout.php">Logout</a>

</body>
</html>