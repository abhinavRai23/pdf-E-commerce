<?php
if(!isset($_SESSION))
	session_start();
if(empty($_SESSION['id']))
	header('location:include/logout.php');
else{
	$id = $_SESSION['id'];
	$user = $_SESSION['username'];
}
?>