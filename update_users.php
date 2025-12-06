<?php
include 'db.php';
$id = $_GET['id'];

if($_POST){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET full_name='$name', email='$email' WHERE id=$id");
    header("Location: users.php");
}

$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<form method="post">
    <input type="text" name="full_name" value="<?= $user['full_name'] ?>" required>
    <input type="email" name="email" value="<?= $user['email'] ?>" required>
    <button type="submit">Update</button>
</form>
<a href="users.php">Back to Users</a>