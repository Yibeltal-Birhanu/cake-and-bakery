<?php
require 'dbconn.php';
$sql = "SELECT customer_name,phone_number, address, zone, payment_method, payment_reference, quantity, product_id, product_name, product_price, total_amount,order_id,STATUS FROM orders";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        .table-container {
            width: 80%;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #913500;
            color: #fff;
        }

        table th, table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .no-data {
            text-align: center;
            padding: 30px;
            font-size: 18px;
            color: #913500;
        }

        .nav {
            background: #913500;
            padding: 15px 25px;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 25px;
            font-weight: bold;
        }

        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="nav">
        <a href="users.php">Users</a>
        <a href="orders.php">Orders</a>
        <a href="uploaded_item.php">Upload Item</a>
    </div>

    <h2>Registered Users</h2>

    <div class="table-container">

        <?php
        if ($result->num_rows > 0) {
            echo "<table><thead><tr><th>Customer Name</th><th>Phone Number</th><th>Address</th><th>Zone</th><th>Payment Method</th><th>Payment Reference</th><th>Quantity</th><th>Product ID</th><th>Product Name</th><th>Product Price</th><th>Total Amount</th><th>Status</th><th>Actions</th></tr></thead><tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['zone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
                echo "<td>" . htmlspecialchars($row['payment_reference']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_price']) . "</td>";
                echo "<td>" . htmlspecialchars($row['total_amount']) . "</td>";
                echo "<td><a href='status_approved.php?order_id=" .$row['order_id'] . "'>Approved Status</a></td>";
                echo "<td><a href='status_disapproved.php?order_id=" .$row['order_id'] . "'>Disapproved Status</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";

        } else {
            echo "<p class='no-data'>No users found.</p>";
        }
        ?>

    </div>

</body>
</html>
