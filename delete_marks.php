<?php
include("db.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM marks WHERE id='$id'");

header("Location: marks.php");
?>