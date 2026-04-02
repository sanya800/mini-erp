<?php
// ✅ include database file
include("db.php");

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // insert query
    $query = "INSERT INTO users (username, email, password) 
              VALUES ('$username', '$email', '$hashed_password')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Signup Successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Mini ERP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Signup Form</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required><br><br>

        <input type="email" name="email" placeholder="Enter Email" required><br><br>

        <input type="password" name="password" placeholder="Enter Password" required><br><br>

        <button type="submit" name="signup">Signup</button>
    </form>
</div>

</body>
</html>