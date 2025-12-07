<?php
require 'dbconn.php';
$sql = "SELECT customer_name, phone_number, address, zone, payment_method, payment_reference, quantity, product_id, product_name, product_price, total_amount, order_id, STATUS FROM orders ORDER BY order_id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders Management</title>
    <style>
    :root {
        --accent: #913500;
        --accent-light: #b8561a;
        --accent-dark: #7a2b00;
        --success: #28a745;
        --warning: #ffc107;
        --danger: #dc3545;
        --info: #17a2b8;
        --muted-shadow: rgba(0,0,0,0.08);
        --container-max: 1400px;
        --transition: all 0.3s ease;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        margin: 0;
        min-height: 100vh;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        color: var(--accent);
        font-size: 2.2em;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        position: relative;
        padding-bottom: 15px;
    }

    h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, var(--accent), var(--accent-light));
        border-radius: 2px;
    }

    .table-container {
        max-width: var(--container-max);
        width: 96%;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        overflow: auto;
        border: 1px solid #eaeaea;
        transition: var(--transition);
    }

    .table-container:hover {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1200px;
    }

    table thead {
        background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
        color: #fff;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    table thead th {
        padding: 18px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 0.95em;
        letter-spacing: 0.5px;
        border-right: 1px solid rgba(255,255,255,0.1);
    }

    table thead th:last-child {
        border-right: none;
    }

    table th, table td {
        padding: 15px;
        border-bottom: 1px solid #eaeaea;
        vertical-align: middle;
        transition: var(--transition);
    }

    table td {
        white-space: normal;
        word-break: break-word;
        max-width: 250px;
        font-size: 0.92em;
    }

    table tbody tr {
        transition: var(--transition);
    }

    table tbody tr:hover {
        background: linear-gradient(90deg, rgba(145, 53, 0, 0.05) 0%, rgba(255,255,255,1) 100%);
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tbody tr:nth-child(even):hover {
        background: linear-gradient(90deg, rgba(145, 53, 0, 0.07) 0%, #f9f9f9 100%);
    }

    .no-data {
        text-align: center;
        padding: 40px;
        font-size: 1.1em;
        color: #6c757d;
        font-style: italic;
        background: #f8f9fa;
        border-radius: 8px;
        margin: 20px;
    }

    .nav {
        background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
        padding: 15px 30px;
        display: flex;
        gap: 25px;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .nav a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
        font-size: 0.95em;
    }

    .nav a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }

    .nav a:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .nav a:hover::before {
        left: 100%;
    }

    .nav a.active {
        background: rgba(255,255,255,0.2);
        box-shadow: inset 0 2px 5px rgba(0,0,0,0.2);
    }

    /* Status badges */
    .status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85em;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: var(--transition);
    }

    .status-approved {
        background: linear-gradient(135deg, var(--success) 0%, #20c997 100%);
        color: white;
        box-shadow: 0 3px 8px rgba(40, 167, 69, 0.3);
    }

    .status-disapproved {
        background: linear-gradient(135deg, var(--danger) 0%, #c82333 100%);
        color: white;
        box-shadow: 0 3px 8px rgba(220, 53, 69, 0.3);
    }

    /* Action buttons */
    .action-btn {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85em;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        text-align: center;
        min-width: 120px;
    }

    .btn-approve {
        background: linear-gradient(135deg, var(--success) 0%, #20c997 100%);
        color: white;
    }

    .btn-disapprove {
        background: linear-gradient(135deg, var(--danger) 0%, #c82333 100%);
        color: white;
    }

    .btn-approve:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
    }

    .btn-disapprove:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }

    /* Price formatting */
    .price-cell {
        font-weight: 600;
        color: var(--accent);
        font-size: 1.05em;
    }

    /* Product name styling */
    .product-name {
        color: #2c3e50;
        font-weight: 600;
    }

    /* Search and filter bar */
    .filter-bar {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .filter-bar input,
    .filter-bar select {
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 0.9em;
        transition: var(--transition);
    }

    .filter-bar input:focus,
    .filter-bar select:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(145, 53, 0, 0.1);
    }

    /* Animation for new rows */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    table tbody tr {
        animation: fadeIn 0.5s ease forwards;
    }

    /* Scrollbar styling */
    .table-container::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .table-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background: var(--accent);
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: var(--accent-dark);
    }

    /* Loading animation */
    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid #f3f3f3;
        border-top: 3px solid var(--accent);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-left: 10px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Small screens adjustments */
    @media (max-width: 768px) {
        .table-container {
            padding: 12px;
            width: 98%;
            margin: 20px auto;
        }

        table {
            min-width: 1000px;
        }

        table th, table td {
            padding: 12px 10px;
            font-size: 0.88em;
        }

        .nav {
            padding: 12px 20px;
            gap: 15px;
            justify-content: center;
        }

        .nav a {
            padding: 8px 14px;
            font-size: 0.9em;
        }

        h2 {
            font-size: 1.8em;
            margin-top: 20px;
        }
    }

    @media (max-width: 480px) {
        .table-container {
            padding: 8px;
        }

        .nav {
            flex-direction: column;
            gap: 10px;
            padding: 15px;
        }

        .nav a {
            width: 90%;
            text-align: center;
        }

        h2 {
            font-size: 1.5em;
        }
    }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <div class="nav">
        <a href="users.php">👥 Users</a>
        <a href="orders.php" class="active">📦 Orders</a>
        <a href="admin.php">📤 Upload Item</a>
    </div>

    <h2>📋 Orders Management</h2>

    <div class="table-container">
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                <thead>
                    <tr>
                        <th>👤 Customer</th>
                        <th>📞 Phone</th>
                        <th>📍 Address</th>
                        <th>🗺️ Zone</th>
                        <th>💳 Payment Method</th>
                        <th>🔖 Reference</th>
                        <th>📦 Quantity</th>
                        <th>🆔 Product ID</th>
                        <th>📛 Product Name</th>
                        <th>💰 Price</th>
                        <th>💲 Total</th>
                        <th>📊 Status</th>
                        <th>⚡ Actions</th>
                    </tr>
                </thead>
                <tbody>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><strong>" . htmlspecialchars($row['customer_name']) . "</strong></td>";
                echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['zone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
                echo "<td>" . htmlspecialchars($row['payment_reference']) . "</td>";
                echo "<td><strong>" . htmlspecialchars($row['quantity']) . "</strong></td>";
                echo "<td>" . htmlspecialchars($row['product_id']) . "</td>";
                echo "<td><span class='product-name'>" . htmlspecialchars($row['product_name']) . "</span></td>";
                echo "<td class='price-cell'>$" . number_format($row['product_price'], 2) . "</td>";
                echo "<td class='price-cell'><strong>$" . number_format($row['total_amount'], 2) . "</strong></td>";
                
                if($row['STATUS'] == 1){
                    echo "<td><span class='status-badge status-approved'>✅ Approved</span></td>";
                    echo "<td><a href='status_disapproved.php?order_id=" . $row['order_id'] . "' class='action-btn btn-disapprove'>❌ Disapprove</a></td>";
                } else {
                    echo "<td><span class='status-badge status-disapproved'>❌ Disapproved</span></td>";
                    echo "<td><a href='status_approved.php?order_id=" . $row['order_id'] . "' class='action-btn btn-approve'>✅ Approve</a></td>";
                }
                echo "</tr>";
            }

            echo "</tbody></table>";

        } else {
            echo "<p class='no-data'>📭 No orders found in the system.</p>";
        }
        ?>
    </div>

    <script>
        // Add hover effect to table rows
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('table tbody tr');
            
            rows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.zIndex = '5';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.zIndex = '1';
                });
            });

            // Add click animation to action buttons
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>