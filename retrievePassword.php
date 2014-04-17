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
	if($error == 'Invalid'){
		echo "<font color = red>Invalid!</font>";
	}
?>
<form action = "post_recover.php" method = "post">
	<font size = "6">Password Recovery</font>
	<table border = "0">
	<tr>
	<td align = "right">
	Email</td><td>
	<input type = "text" name = "email"/>
	<tr><td></td><td>
	<input type = "submit" name = "Recover" value = "Recover" />
</form>
</body>
</html>
