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
    :root {
        --accent: #913500;
        --muted-shadow: rgba(0,0,0,0.08);
        --container-max: 1100px;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        margin: 0;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        color: var(--accent);
    }

    .table-container {
        max-width: var(--container-max);
        width: 94%;
        margin: 30px auto;
        background: #fff;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0 2px 8px var(--muted-shadow);
        overflow: auto; 
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1100px;
    }

    table thead {
        background: var(--accent);
        color: #fff;
    }

    table thead th {
        position: sticky;
        top: 0;
        z-index: 2;
        text-align: left;
    }

    table th, table td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        vertical-align: top;
    }

    table td {
        white-space: normal;
        word-break: break-word;
        max-width: 280px;
    }

    table tbody tr:hover {
        background: #fafafa;
    }

    .no-data {
        text-align: center;
        padding: 30px;
        font-size: 18px;
        color: #ff0000ff;
    }

    .nav {
        background: var(--accent);
        padding: 12px 20px;
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .nav a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        padding: 8px 12px;
        border-radius: 6px;
        transition: background .15s ease;
    }

    .nav a:hover {
        background: rgba(255,255,255,0.08);
    }

    /* small screens adjustments */
    @media (max-width: 700px) {
        .table-container {
            padding: 8px;
            width: 98%;
        }

        table {
            min-width: 900px;
        }

        table th, table td {
            padding: 10px 8px;
            font-size: 13px;
        }
    }
</style>
</head>
<body>
   <!-- NAVBAR -->
<div class="nav">
    <a href="users.php">Users</a>
    <a href="orders.php">Orders</a>
    <a href="admin.php">Upload Item</a>
</div>

<h2>Orders</h2>

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
                if($row['STATUS'] == 1){
                    echo "<td>Approved</td>";
                    echo "<td><a href='status_disapproved.php?order_id=" .$row['order_id'] . "'>Disapproved Status</a></td>";
                } else {
                    echo "<td>Disapproved</td>";
                    echo "<td><a href='status_approved.php?order_id=" .$row['order_id'] . "'>Approved Status</a></td>";
                }
                echo "</tr>";
            }

        echo "</tbody></table>";

    } else {
        echo "<p class='no-data'>No orders found.</p>";
    }
    ?>

</div>

</body>
</html>
