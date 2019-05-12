<?php
	$prod = false;
	$db_hostname = $prod ? '182.50.133.88:3306' : 'localhost';
	$db_database = $prod ? 'ph16722039727_vinra' : 'vinra';
	$db_username =  $prod ? 'vinra' : 'root';
	$db_password = $prod ? 'Mo&p6a97' : '';
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
?>