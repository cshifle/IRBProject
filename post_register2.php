<?php
	session_start();
	include('dbconnect.php');
	$registerUser = trim($_SESSION['registerUser']);
	$name = $_SESSION['name'];
?>
<html>
<body>

<?php include("menu.php"); ?>
	
<?php
	if ( $registerUser == 'student' )
	{
?>
		<font face = "century gothic">
		<center>
		</br>
		<font size = 6>Thank You for Registering <?php echo $name; ?></font>
		<br/>
		<font size = 4>Please check your email for <a href = "validate.php" style = "text-decoration:none">validation.</a></font>
		<br/>
<?php
	}
	else
	{
?> 	
		<font face = "century gothic">
		<center>
		</br>
		<font size = 6>Thank You for Registering <?php echo $name; ?></font>
		<br/>
		<font size = 4>The site administrator has been notified of your registration. You will receive email notification once the administrator validates you.</font>
		<br/>
<?php
	}
?>
</body>
</html>
