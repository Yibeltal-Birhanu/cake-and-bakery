<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            background: #f4f4f4;
        }

        /* ===== NAVBAR ===== */
        nav {
            background: #913500;
            padding: 15px 25px;
            display: flex;
            gap: 30px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 14px;
            border-radius: 5px;
            transition: 0.3s;
        }

        nav a:hover {
            background: #555;
        }

        /* ===== CONTAINER ===== */
        .container {
            margin: 30px auto;
            width: 80%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #913500;
        }

        h1 {
            margin-top: 0;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="file"] {
            padding: 5px;
        }

        input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            width: 200px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: #0056c2;
        }

        .back-link {
            display: inline-block;
            margin-left: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav>
        <a href="users.php">Users</a>
        <a href="orders_items.php">Orders</a>
        
    </nav>

    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the admin panel. Use the navigation links above to manage users, orders, and upload products.</p>

        <h3>Add New Item</h3>

        <form action="add_item.php" method="POST" enctype="multipart/form-data">
            
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required>

            <label for="item_price">Item Price:</label>
            <input type="number" step="0.01" id="item_price" name="item_price" required>

            <label for="item_description">Item Description:</label>
            <textarea id="item_description" name="item_description" rows="4" required></textarea>

            <label for="item_image">Item Image:</label>
            <input type="file" id="item_image" name="item_image" accept="image/*" required>

            <input type="submit" value="Add Item">
        </form>
    </div>

</body>
</html>
