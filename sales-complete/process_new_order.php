<?php

session_start ();

require_once 'include/connection.inc.php';

$userid = $_SESSION ['userid'];
$fullname = $_SESSION ['fullname'];

$invoice_no = trim ( $_POST ['invoice_no'] );
$cust_name = trim ( $_POST ['cust_name'] );
$hp_no = trim ( $_POST ['hp_no'] );
$product = $_POST ['product'];
$price = trim ( $_POST ['price'] );
$quantity = trim ( $_POST ['quantity'] );

// kalau coding ni tak jalan, comment sql ni (line 18 & 19), then uncomment line 21 & 22
$sql = "INSERT INTO `order`(`invoiceno`, `fullname`, `custname`, `hpno`, `product`, `quantity`, `price`, `userid`) 
		VALUES ('$invoice_no', '$fullname', '$cust_name', '$hp_no', '$product', '$quantity', '$price', '$userid')";

// $sql = "INSERT INTO order(invoiceno, fullname, custname, hpno, product, quantity, price, userid) 
// 		VALUES ('$invoice_no', '$fullname', '$cust_name', '$hp_no', '$product', '$quantity', '$price', '$userid')";

$result = mysqli_query($dbc, $sql);

mysqli_close($dbc);

header("Location:list_order.php?mode=add_order");

?>








