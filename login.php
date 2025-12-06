<?php
require 'dbconn.php';
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0 && password_verify($password, $result->fetch_assoc()['password'])) {
        echo "Login successful!";
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Please provide email and password.";
}

?>