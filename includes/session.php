<?php
	if(!isset($_SESSION))
		session_start();
	if(empty($_SESSION['user_id']))
		session_destroy();
	else{
		$id = $_SESSION['user_id'];
		$user = $_SESSION['username'];
	}
?>