<html>
<body>
<?php include("menu.php");?>

</br>
<center>
<font size = "6">Password Change</font>
<form method = "post" action = "postPasswordChange.php">
	<table align = "center" border = "0">
	<tr>
	<td align = "right">
	Email:
	</td><td>
	<input type = "text" name="email">
	</td></tr>
	<tr><td align = "right">
	Old Password:
	</td><td>
	<input type = "text" name="oldPass" />
	</td></tr>
	<tr><td align = "right">
	New Password:
	</td><td>
	<input type = "text" name = "newPass"/>
	</td></tr>
	<tr><td align ="right">
	Retype Password: 
	</td><td>
	<input type = "text" name = "newPass2"/>
	</td></tr>
	<tr><td></td><td>
	<input type =submit value = "Submit"/>
	</td></tr>
	</table>
</form>
<a href = "home.php" style = "text-decoration:none">home</a>
</center>
</body>
</html>
