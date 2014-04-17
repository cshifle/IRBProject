
<?php
	session_start();
?>
<html>
<body>

<?php include("menu.php"); ?>

</br>
<font face = "century gothic">
<center>
<?php
	$error = $_SESSION['error'];
	if ( $error == 'Invalid Password' )
	{
		echo"<font color = red>Invalid Password!</font>";		
	}
?>
<form action = "post_login.php" method = "post">
	<font size = "6">Login</font>
	<table border = "0">
	<tr>
	<td align = "right">
	Email:
	</td><td>
	<input type = "text" name = "email" />
	</td><td>
	<tr><td align = "right">
	Password:
	</td><td>
	<input type = "password" name = "password" />
	</td></tr>
	<tr><td></td><td>
	<input type = "submit" name = "Login" value = "Login" />
	</td>
	</table>
</form>
</table>
<center>
<a href="retrievePassword.php" style = "text-decoration:none">forgot password?</a> | <a href = "validate.php" style = "text-decoration:none">validate</a></center>
</body>
</html>
