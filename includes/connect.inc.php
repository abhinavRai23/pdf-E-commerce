<?php
	$prod = false;
	$db_hostname = $prod ? 'prod_server_ip' : 'localhost';
	$db_database = $prod ? 'prod_dp' : 'vinra';
	$db_username =  $prod ? 'username' : 'root';
	$db_password = $prod ? 'password' : '';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
?>
