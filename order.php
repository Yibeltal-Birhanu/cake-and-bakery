<?php
include 'dbconn.php';
session_start();
if(isset($_POST['order'])){
    // For debugging: safely display received values
    function val($k) { return isset($_POST[$k]) ? htmlspecialchars($_POST[$k]) : '(missing)'; }
    echo "Name: " . val('fname') . "<br>";
    echo "Phone: " . val('pno') . "<br>";
    echo "Address: " . val('address') . "<br>";
    echo "Zone: " . val('zone') . "<br>";
    echo "Payment method: " . val('payment_method') . "<br>";
    echo "Payment reference: " . val('paymentRef') . "<br>";
    echo "Quantity: " . val('orderQuantity') . "<br>";
    echo "Product ID: " . val('product_id') . "<br>";
    echo "Product Name: " . val('orderItem') . "<br>";
    echo "Product Price: " . val('orderPrice') . "<br>";
    echo "Total Amount: " . val('totalAmount') . "<br>";
    $sql='INSERT INTO orders (customer_name, phone_number, address, zone, payment_method, payment_reference, quantity, product_id, product_name, product_price, total_amount,id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('ssssssiisddi', $_POST['fname'], $_POST['pno'], $_POST['address'], $_POST['zone'], $_POST['payment_method'], $_POST['paymentRef'], $_POST['orderQuantity'], $_POST['product_id'], $_POST['orderItem'], $_POST['orderPrice'], $_POST['totalAmount'], $_SESSION['id']);
    if($stmt->execute()){
        echo "Order placed successfully!";
    } else {
        echo "Error placing order: " . $stmt->error;
    }
    $stmt->close();
}
?>
