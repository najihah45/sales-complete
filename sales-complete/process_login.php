<?php

session_start();

// grab data from index.php
$username = trim ( $_POST ['username'] );
$password = trim ( $_POST ['password'] );

// echo $username. " " .$password;

// 1. connect to DB - include connection.inc.php
require_once ("include/connection.inc.php");

$hashed_pw = md5($password);


// 2. query data in database -> using AES encryption technique (can encrypt and decrypt)
// $sql = "SELECT * FROM users, roles WHERE username like '$username'
// 		&& password like AES_ENCRYPT('$password','salt') 
// 		&& users.roleid = roles.roleid";


// UPDATE users SET passwprd = MD5('123') --> cannot decrypt - for safety 

// kalau coding ni tak jalan, comment sql ni (line 26 & 27), then uncomment line 29 & 30
$sql = "SELECT * FROM `users`, `roles` WHERE `username` LIKE '$username' 
        AND `password` LIKE '$hashed_pw' AND `users`.`roleid` = `roles`.`roleid`";

// $sql = "SELECT * FROM users, roles WHERE username LIKE '$username' 
//         AND password LIKE '$hashed_pw' AND users.roleid = roles.roleid";

// echo $sql;

$result = mysqli_query($dbc, $sql);


if(mysqli_num_rows($result) <= 0) {
	header("Location:index.php?mode=invalid");  // redirects to another index.php
	exit();
}


// fetch data from all columns
$record = mysqli_fetch_array($result);

$_SESSION['userid'] = $record['userid'];
$_SESSION['fullname'] = $record['fullname'];
$_SESSION['roleid'] = $record['roleid'];

mysqli_close($dbc);

// 3. kalau data in db matched with data from users, 
// redirects to another page list_contacts.php

header("Location:list_order.php");

exit();


?>










