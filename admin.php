<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        nav a { margin-right: 20px; text-decoration: none; color: blue; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <nav>
        <a href="users.php">Users</a>
        <a href="orders.php">Orders</a>
    </nav>
    <p>Welcome to the admin panel. Use the links above to manage users and orders.</p>
    <h3>New Item Entry</h3>
    <form action="add_item.php" method="POST" enctype="multipart/form-data">
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" required><br><br>
        
        <label for="item_price">Item Price:</label><br>
        <input type="number" step="0.01" id="item_price" name="item_price" required><br><br>
        <label for="item_description">Item Description:</label><br>
        <textarea id="item_description" name="item_description" required></textarea><br><
        <label for="item_image">Item Image:</label><br>
        <input type="file" id="item_image" name="item_image" accept="image/*" required><br><br>
        
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
