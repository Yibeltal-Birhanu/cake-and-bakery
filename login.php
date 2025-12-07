<?php
require 'dbconn.php';
session_start();
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT password,id FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            header("Location: loged.php");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Please provide email and password.";
}

?>