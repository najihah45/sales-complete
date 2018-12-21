<?php

session_start ();

require_once 'include/connection.inc.php';

$userid = $_SESSION ['userid'];
$fullname = $_SESSION ['fullname'];

$orderid = $_POST['orderid'];

// echo "Order id : " .$orderid;

$invoice_no = trim ( $_POST ['invoice_no'] );
$cust_name = trim ( $_POST ['cust_name'] );
$comp_name = trim ( $_POST ['comp_name'] );
$cust_add = trim ( $_POST ['cust_add'] );
$hp_no = trim ( $_POST ['hp_no'] );
$email = trim ( $_POST ['email'] );
$product = $_POST ['product'];
$price = trim ( $_POST ['price'] );
$quantity = trim ( $_POST ['quantity'] );

// kalau coding ni tak jalan, comment sql ni (line 26-29), then uncomment line 31-34

$sql = "UPDATE `order` SET `fullname`='$fullname',`invoiceno`='$invoice_no',`custname`='$cust_name',
	   `compname`='$comp_name',`compaddress`='$cust_add',`hpno`='$hp_no',`email`='$email',
		`product`='$product',`quantity`='$quantity',`price`=$price,`userid`=$userid 
		WHERE `orderid` = $orderid";

// $sql = "UPDATE order SET fullname='$fullname', invoiceno='$invoice_no', custname='$cust_name',
// 	    compname='$comp_name', compaddress='$cust_add', hpno='$hp_no', email='$email',
// 		 product='$product', quantity='$quantity', price='$price', userid='$userid' 
// 		WHERE orderid = '$orderid'";


// echo $sql;

$result = mysqli_query($dbc, $sql);

mysqli_close($dbc);

header("Location:list_order.php?mode=update");

?>








