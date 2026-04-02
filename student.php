<?php
session_start();
include("db.php");

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user'];

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Student Panel 👩‍🎓</h2>

<?php if($row) { ?>

<p><b>Username:</b> <?php echo $row['username']; ?></p>
<p><b>Email:</b> <?php echo $row['email']; ?></p>

<?php } else { ?>

<p>User data not found!</p>

<?php } ?>

<br>
<a href="dashboard.php">⬅ Back</a>

</body>
</html>