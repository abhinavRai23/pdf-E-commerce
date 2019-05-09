<?php
	if(!isset($_SESSION))
		session_start();
	if(empty($_SESSION['id']) || $_SESSION['user_type']!=1)
		header('location:http://'.$_SERVER['HTTP_HOST'].'/admin/include/logout.php');
	else{
		$id = $_SESSION['id'];
		$user = $_SESSION['username'];
	}
?>