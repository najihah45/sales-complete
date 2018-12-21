<html>

<head>

<title>New Order</title>

<link rel="stylesheet" type="text/css" href="gaya.css">

<script type="text/javascript">

window.onload = function (){
	document.getElementById("invoiceno").focus();		
};

function gotoList() {
	
	window.location.href = "list_order.php";
	
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

?>

<body>


	<?php
	// paparkan "Hai, fullname!"
	echo "<h5> Hi, $fullname ! </h5>";
	?>

		<table align="center">
			<tr>
				<td> <?php include_once 'include/tab_menu.html'; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
		</table>
	
	<form action="process_new_order.php" method="post">	

		<table align="center">

			<tr>
				<td style="font-weight: bold; padding-bottom: 10px" align="right">
				Invoice No</td>
				<td style="padding-bottom: 10px"><input type="text"
					name="invoice_no" id="invoiceno"/></td>
			</tr>

			<tr>
				<td style="font-weight: bold; padding-bottom: 10px" align="right">Customer
					Name</td>
				<td style="padding-bottom: 10px"><input type="text" name="cust_name" />
				</td>
			</tr>

			<tr>
				<td style="font-weight: bold; padding-bottom: 10px" align="right">Handphone
					No</td>
				<td style="padding-bottom: 10px"><input type="text" name="hp_no" />
				</td>
			</tr>

			<tr>
				<td style="font-weight: bold; padding-bottom: 10px" align="right">Product</td>
				<td style="padding-bottom: 10px"><select name="product">
				<option value="" selected="selected" disabled="disabled">Select a product</option>
				
				<?php 
				
				// kalau coding ni tak jalan, comment sql ni (line 87), then uncomment line 89

				$sql = "select `productname` from `product`";

				// $sql = "select productname from product";
				
				$result = mysqli_query($dbc, $sql);  // run sql statement
				
				while ($row = mysqli_fetch_array($result)){
					echo '<option value=" ' . $row['productname'] . ' "> 
		                   ' . $row['productname'] . ' </option>';
				}
								
				?>
				
				</select></td>
			</tr>

			<tr>
				<td style="font-weight: bold; padding-bottom: 10px" align="right">Quantity</td>
				<td style="padding-bottom: 10px"><input type="text" name="quantity" />
			
			</tr>

			<tr>
				<td style="font-weight: bold; padding-bottom: 10px" align="right">Total
					Price (RM)</td>
				<td style="padding-bottom: 10px"><input type="text" name="price" /></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td style="padding-bottom: 10px"><input type="submit"
					name="con_submit" value="Save" /> <input type="reset"
					name="con_reset" value="Reset" /> <input type="button"
					value="Cancel" onclick="gotoList();" /></td>
			</tr>
		</table>
		</table>
	</form>
</body>
</html>
