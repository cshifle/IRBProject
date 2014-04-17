<html>
<body>

<?php include("menu.php"); ?>
<?php include ("options_menu.php"); ?>
<font face = "century gothic">

<font color = red>
<?php
	include('dbconnect.php');
	
	$email = $_POST['email'];  
	echo "Welcome ". $email ."!"; 
?>

</br>
<a href = "home.php">Home</a>
</font>
</body>
</html>


