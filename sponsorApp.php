<?php
	session_start();
	include('dbconnect.php');
	include ("menu.php"); 
	include("options_menu.php);

	$email = $_SESSION['user'];
	$decision = $_POST['decision'];

?>
