<?php
require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_description = $_POST['item_description'];
    $item_category = $_POST['item_category'];

    // ---- VERY SIMPLE FILE UPLOAD ----
    $fileName = $_FILES['item_image']['name'];
    $tmpName  = $_FILES['item_image']['tmp_name'];

    // just store image with original name (unsafe but simple)
    $uploadFolder = "uploaded_images/";
    $destination = $uploadFolder . $fileName;

    // move uploaded file
    move_uploaded_file($tmpName, $destination);

    // ---- SIMPLE DB INSERT ----
    $sql = "INSERT INTO products (name, price, image, description, item_category)
            VALUES ('$item_name', '$item_price', '$destination', '$item_description', '$item_category')";

    if ($conn->query($sql)) {
        echo "Item added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Item</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f1f1f1;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 450px;
        background: #fff;
        margin: 50px auto;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.15);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: 600;
    }

    input, textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #27ae60;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: .3s;
    }

    button:hover {
        background: #1e8b4d;
    }

    .message {
        margin-bottom: 15px;
        padding: 12px;
        background: #d1f2d9;
        border-left: 4px solid #27ae60;
        border-radius: 4px;
        color: #155724;
    }
</style>
</head>

<body>

<div class="container">
    <h2>Add New Product</h2>

    <?php if (!empty($message)) : ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="item_name" placeholder="Item Name" required>
        <input type="number" name="item_price" placeholder="Item Price" required>
        <textarea name="item_description" placeholder="Description"></textarea>
        <select name="item_category" required>
            <option value="" disabled selected>Select Category</option>
            <option value="cake">Cake</option>
            <option value="bakery">Bakery</option>
        <input type="file" name="item_image" required>
        <button type="submit">Add Item</button>
    </form>

</div>

</body>
</html>