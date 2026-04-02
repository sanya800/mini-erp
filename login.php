<?php
session_start();
include("db.php");

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "Entered Email: " . $email;

    $query = "SELECT * FROM users WHERE email='$email'";
    echo "<br>Query: " . $query;

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error: " . mysqli_error($conn));
    }

    echo "<br>Rows found: " . mysqli_num_rows($result);

    if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if($row['password'] == $password) {

        $_SESSION['user'] = $row['email'];
        $_SESSION['role'] = $row['role'];

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Wrong Password!";
    }

} else {
    echo "User not found!";
}
}
?>
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Login Page</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>