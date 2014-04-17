<html>
<body>

<?php include("menu.php"); ?>

<font face = "century gothic">

</br>
<center>
<font size = "6">Validate</font>
<form method = "post" action = "post_validate.php">
	<table border = "0">
	<tr><td align = "right">
	Email:
	</td><td>
	<input type = "text" name = "email" />
	</td><td>
	<tr>
	<td align = "right">
	Enter the code that was sent in your email:
	</td><td>
	<Input type= "text" name=hash />
	</td></tr>
	<tr><td></td><td>
	<input type=submit />
	</td>
</form>
</table>
</center>
	
</body>
</html>
