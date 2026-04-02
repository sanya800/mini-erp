<?php
include("db.php");

$id = $_GET['id'];

// Fetch existing data
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Update data
if(isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $update = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
    mysqli_query($conn, $update);

    header("Location: admin.php");
}
?>

<h2>Edit User ✏️</h2>

<form method="POST">
    <input type="text" name="username" value="<?php echo $user['username']; ?>"><br><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
    <button type="submit" name="update">Update</button>
</form>