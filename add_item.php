<?php
require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_description = $_POST['item_description'];

    // ---- VERY SIMPLE FILE UPLOAD ----
    $fileName = $_FILES['item_image']['name'];
    $tmpName  = $_FILES['item_image']['tmp_name'];

    // just store image with original name (unsafe but simple)
    $uploadFolder = "uploaded_images/";
    $destination = $uploadFolder . $fileName;

    // move uploaded file
    move_uploaded_file($tmpName, $destination);

    // ---- SIMPLE DB INSERT ----
    $sql = "INSERT INTO products (name, price, image, description)
            VALUES ('$item_name', '$item_price', '$destination', '$item_description')";

    if ($conn->query($sql)) {
        echo "Item added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
