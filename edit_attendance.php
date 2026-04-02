<?php
include("db.php");

$id = $_GET['id'];

// Fetch existing data
$query = "SELECT * FROM attendance WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

// Update
if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $update = "UPDATE attendance 
               SET student_name='$name', date='$date', status='$status' 
               WHERE id='$id'";
    mysqli_query($conn, $update);

    header("Location: attendance.php");
}
?>

<h2>Edit Attendance ✏️</h2>

<form method="POST">
    <input type="text" name="name" value="<?php echo $data['student_name']; ?>"><br><br>
    <input type="date" name="date" value="<?php echo $data['date']; ?>"><br><br>

    <select name="status">
        <option value="Present" <?php if($data['status']=="Present") echo "selected"; ?>>Present</option>
        <option value="Absent" <?php if($data['status']=="Absent") echo "selected"; ?>>Absent</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>
</form>