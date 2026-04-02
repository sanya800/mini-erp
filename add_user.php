<?php
include("db.php");

if(isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $query);

    header("Location: admin.php");
}
?>

<h2>Add User ➕</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="add">Add User</button>
</form>