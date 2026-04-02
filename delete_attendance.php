<?php
include("db.php");

$id = $_GET['id'];

$query = "DELETE FROM attendance WHERE id='$id'";
mysqli_query($conn, $query);

header("Location: attendance.php");
?>