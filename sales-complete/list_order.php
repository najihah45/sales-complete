<html>

<head>

	<title>View Order</title>

	<link rel="stylesheet" type="text/css" href="gaya.css">

	<script type="text/javascript">

	function deleteOrder(orderid) {		
		if (confirm("Are you sure you want to delete?")) {
			window.location.href = 'list_order?deleteOrder='+ orderid;
			return true;
		} else {
			return false;
		 }
	}

	</script>

</head>


<?php
session_start ();

require_once 'include/connection.inc.php';
include_once 'include/header.html';

$userid = $_SESSION ['userid'];
$fullname = $_SESSION ['fullname'];
$roleid = $_SESSION ['roleid'];


// kalau coding ni tak jalan, comment sql ni (line 38-42), then uncomment line 44-48

if ($roleid == 1) { // admin roleid = 1, admin can view all orders
	$sql = "SELECT * FROM `order`";
} else { // regular staff, can view only their orders
	$sql = "SELECT * FROM `order` WHERE `userid` = $userid";
}

// if ($roleid == 1) { // admin
// 	$sql = "SELECT * FROM order";
// } else {
// 	$sql = "SELECT * FROM order WHERE userid = $userid";
// }

$result = mysqli_query ( $dbc, $sql );

?>

<body>

	<?php
		// paparkan "Hai, fullname!"
		echo "<h5> Hi, $fullname ! </h5>";
	?>

	<?php 			
			if (! empty ( $_GET ['mode'] )) {
				switch ($_GET ['mode']) {
					case "delete" :
						echo "<h5 style='color:green;'> Order successfully deleted</h5>";
						break;
					case "update" :
						echo "<h5 style='color:blue;'> Order successfully updated</h5>";
						break;
					case "add_order" :
						echo "<h5 style='color:green;'> Successfully added a new order</h5>";
						break;
				}
			}
			
			?>

		<table align="center">
			<tr>
				<td> <?php include_once 'include/tab_menu.html'; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
		</table>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">		

		<table style="border: solid 2px black;" cellspacing="0" cellpadding="10" align="center">

			<tr id="header">							
				<td align="center"><b>Customer Name</b></td>
				<td align="center"><b>Invoice No</b></td>	
				<td align="center"><b>Handphone No </b></td>
				<td align="center"><b>Product</b></td>
				<td align="center"><b>Quantity</b></td>
				<td align="center"><b>Total price (RM)</b></td>
				<td>&nbsp;</td>
			</tr>
			
			<?php
			// if data does not exist
			if (mysqli_num_rows ( $result ) <= 0) {
				echo '<tr><td colspan="3"> No data found </td></tr>';
			}
			
			// display data
			while ( $row = mysqli_fetch_array ( $result ) ) {
				echo '<tr>';
				
				echo '<td>' . $row ['custname'] . '</td>
					  <td>' . $row ['invoiceno'] . '</td>
					  <td>' . $row ['hpno'] . '</td>
					  <td>' . $row ['product'] . '</td>
					  <td>' . $row ['quantity'] . '</td>
					  <td>' . $row ['price'] . '</td>
					  <td> 
						<a href="edit_order.php?orderid=' . $row ['orderid'] . '">
							<img src="images/edit.jpg" width="15px" height="15px" title="Edit order"/>
						</a>';
				
				if ($roleid == 1) {
					
					echo '<a href="delete_order.php?orderid=' . $row ['orderid'] . '" 
							    onclick = "return deleteOrder (' . $row['orderid'] . ');">
						  <img src="images/delete.jpg" width="15px" height="15px" title="Edit order"/>
						</a>';
				}
				
				echo '</td>				
						</tr>';
			}
			
			?>
			
		</table>
	</form>

</body>
</html>
