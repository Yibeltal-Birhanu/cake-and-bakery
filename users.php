<?php
require 'dbconn.php';
$sql = "SELECT * FROM users";
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
        <a href="orders_item.php">Orders</a>
        <a href="admin.php">Upload Item</a>
        <a href="ordered_item.php">Uploaded Item</a>
    </div>

    <h2>Registered Users</h2>

    <div class="table-container">

        <?php
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>";
            echo "</thead><tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['email'] . "</td>
                      </tr>";
            }

            echo "</tbody></table>";

        } else {
            echo "<p class='no-data'>No users found.</p>";
        }
        ?>

    </div>

</body>
</html>
