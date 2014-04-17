
<?php
	session_start();
	$user = $_SESSION['user'];
	
?>

<html>
<body>
<center>
<font face = "century gothic">
<table width = "100%" bgcolor = "000066">
	<tr>
		<td align = "left"><font color = "white" size = "6">Institutional Review Board (IRB)</font></td>
        	<td align = "right"></td>
	</tr><tr>
		<td align = "left"><font color = white size = 4>University of Mary Washington</font></td>
        	<?php
			if ( isset($_SESSION['user']) ){
		?>		<td align = "right"><a href = "logout.php" style = "text-decoration: none"><font color = "white">logout</a> | <a href = "changePassword.php" style = "text-decoration: none"><font color = "white">change password</a></td></font>
	</tr>
		<?php
			}
			else{
		?>		<td align = "right"><a href = "register.php" style = "text-decoration: none"><font color = "white">register</a> | <a href = "login.php" style = "text-decoration: none"><font color = "white" >login</a></td></font>
	</tr>
		<?php
			}
		?>
</table>
</center>
</body>
</html>
