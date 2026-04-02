<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM marks WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    mysqli_query($conn, "UPDATE marks 
        SET student_name='$name', subject='$subject', marks='$marks' 
        WHERE id='$id'");

    header("Location: marks.php");
}
?>

<h2>Edit Marks</h2>

<form method="POST">
<input type="text" name="name" value="<?php echo $data['student_name']; ?>"><br><br>
<input type="text" name="subject" value="<?php echo $data['subject']; ?>"><br><br>
<input type="number" name="marks" value="<?php echo $data['marks']; ?>"><br><br>

<button name="update">Update</button>
</form>