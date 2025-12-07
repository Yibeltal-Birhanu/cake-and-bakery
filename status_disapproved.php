<?php
require 'dbconn.php';
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Update the order status to 'Disapproved'
    $sql = "delete from orders WHERE order_id='$order_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Order status updated to Disapproved successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No order ID provided.";
}
header("Location: orders_item.php");
exit;
?>