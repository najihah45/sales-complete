<html>

<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="gaya.css">
</head>

<?php

if (! empty ( $_GET ['mode'] )) {
	switch ($_GET ['mode']) {
		case "invalid" :
			echo "<h3 style='color:red;'> Invalid login. 
						Please try again.</h3>";
			break;
		
		case "logout" :
		echo "<h3 style='color:green;'> Successfully logged out</h3>";
			break;
	}
}

// include_once 'include/header.html';

?>

<body>

	<img alt="Ini adalah banner" src="images/header.png" width="100%" height="180">

	<form action="process_login.php" method="post">

		<table align="center">

			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>

			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>

			<tr>
				<td>Password</td>
				<td ><input type="password" name="password"></td>
			</tr>

			<tr>
				<td align="center" colspan="3">
					<input type="submit" name="login" value="Login"> 
					<input type="reset" name="reset" value="Reset">
				</td>
				<td>&nbsp;</td>
			</tr>

		</table>

	</form>

</body>

</html>

<?php
?>