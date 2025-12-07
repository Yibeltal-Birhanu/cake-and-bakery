<?php
require 'dbconn.php';
if(isset($_POST['signupName'])) {
    $name = $_POST['signupName'];
    $email = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $confirm = $_POST['confirm'];
    if($password !== $confirm) {
        echo "Passwords do not match.";
        exit;
    }
   
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email','$hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Please fill in all required fields.";
}
?>