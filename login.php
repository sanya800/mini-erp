<?php
session_start();
include("db.php");

if(isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE LOWER(TRIM(email))=LOWER(TRIM('$email'))";
    $result = mysqli_query($conn, $query);
    echo "Entered Email: " . $email;

    if(mysqli_num_rows($result) == 1) {
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