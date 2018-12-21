<?php

session_start();

require_once 'include/connection.inc.php';

$orderid = $_GET['orderid'];

// kalau coding ni tak jalan, comment sql ni (line 11), then uncomment line 13

$sql = "DELETE FROM `order` WHERE `orderid` = $orderid";

// $sql = "DELETE FROM order WHERE orderid = $orderid";

if(!mysqli_query($dbc, $sql)) {
	die("Error. Data cannot be deleted.");
}

mysqli_close($dbc);

header("Location:list_order.php?mode=delete");

exit();
?>