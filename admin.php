<?php
session_start();
include("db.php");

if(!isset($_SESSION['user']) || $_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <!-- ✅ CSS LINK -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Admin Panel 🧑‍🏫</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<br>

<a href="add_user.php">➕ Add New User</a><br><br>
<a href="dashboard.php">⬅ Back</a> |
<a href="logout.php">🚪 Logout</a>

</body>
</html>