<?php
require 'dbconn.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE products SET name='$name', price='$price', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br><br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>"><br><br>
                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>
                <input type="submit" value="Update">
                <?php
            } else {
                echo "No record found.";
            }
        } else {
            echo "Invalid request.";
        }
        ?>  
</body>
</html>