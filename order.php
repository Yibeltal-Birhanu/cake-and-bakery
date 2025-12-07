<?php
include 'dbconn.php';
if(isset($_POST['order'])){
    echo $_POST['fname'];
   echo $_POST['payment_method'];
   echo $_POST['address'];
   echo $_POST['pno'];
   echo $_POST['zone'];
   echo $_POST['paymentRef'];
}
?>
