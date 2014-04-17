<html>
<body>

<?php include("menu.php"); ?>

<font face = "century gothic">

</br>
<center>
<font size = "6">Register</font>
<form method = "post" action = "post_register.php">
	<table border = "0">
	<tr>
	<td align = "right">
	Name:
	</td><td>
	<input type = "text" name = "name" />
	</td><td>
	<tr><td align = "right">
	Email:
	</td><td>
	<input type = "text" name = "email" />
	</td><td>
	<font size = "2" color = "666666">Must be a umw.edu address<i></i></font>
	</td></tr>
	<tr><td align = "right">
	Role:
	</td><td>
	<select name="role">
		<option value="student">Student</option>
		<option value="faculty">Faculty</option>
		<option value="member">IRB Member</option>
	</select>
	</td></tr>
	<tr>
	<td align = "right">
	Enter Password:
	</td><td>
	<Input type=password name=pass />
	</td></tr>
	<tr>
	<td align = "right">
	Re-Enter Password:
	</td><td>
	<Input type=password name=pass2 />
	</td></tr>
	<tr><td></td><td>
	<input type=submit value = "Register" />
	</td>
</form>
</table>
</center>
	
</body>
</html>
