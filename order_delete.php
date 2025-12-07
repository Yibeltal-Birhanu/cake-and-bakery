<?php
require 'dbconn.php';
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Update the order status to 'Disapproved'
    $sql = "DELETE FROM products WHERE id='$order_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Order status updated to DELETED successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No order ID provided.";
}
header("Location: ordered_item.php");
exit;
?>