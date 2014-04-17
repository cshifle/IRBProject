<?php
	session_start();
	include('dbconnect.php');
	
	$email = $_SESSION['user'];
	$query = "SELECT permission FROM users WHERE email='$email'";
	$permission = mysqli_query($db, $query);
	$row = mysqli_fetch_array($permission);
	$permission = $row[0];
?>
<html>
<body>
<center>
<font face = "century gothic">
<table width = "100%" bgcolor = "888888">
	<tr>
	<?php
		if ($permission == 'student')
		{	
	?>
			<td align = "left"></td>
        		<td align = "center"><a href = "profile.php" style = "text-decoration: none"><font color = "white">profile</a> | <a href = "forms.php" style = "text-decoration: none"><font color = "white">forms</a>
			</td></font>
			<td align = "right"><font color = white><b>user: </b><?php echo "$user" ?></td></font>
	<?php
		}
		else if ($permission == 'admin')
		{
	?>
			<td align = "left"></td>
        		<td align = "center"><a href = "profile.php" style = "text-decoration: none"><font color = "white">profile</a> | <a href = "adminValidate.php" style = "text-decoration: none"><font color = "white">validate</a>
			</td></font>
			<td align = "right"><font color = white><b>user: </b><?php echo "$user" ?></td></font>
	<?php
		
		}
		else
		{
	?>
			<td align = "left"></td>
        		<td align = "center"><a href = "profile.php" style = "text-decoration: none"><font color = "white">profile / validate</a>
			</td></font>
			<td align = "right"><font color = white><b>user: </b><?php echo "$user" ?></td></font>

	<?php
		}
	
	?>
	</tr>
</table>
</center>
</body>
</html>
