<?php
include 'db.php';

// Fetch orders
$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Orders</h1>
    <a href="index.php">Back to Dashboard</a>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['user_id'] ?></td>
            <td><?= $row['product_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['order_date'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
