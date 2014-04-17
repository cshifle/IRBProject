<?php
	session_start();
?>
<html>
<body>
<center>
<font face = "century gothic">
<table width = "100%" bgcolor = "888888">
	<tr>
		<td align = "left"></td>
		<td align = "center"><a href = "profile.php" style = "text-decoration: none"><font color = "white">profile</a> | <a href = "forms.php" style = "text-decoration: none"><font color = "white">forms</a> | <a href ="adminValidate.php" style = "text-decoration: none"><font color = "white">validate</a>
		</td></font>
		<td align = "right"><font color = white><b>user: </b><?php echo "$user" ?></td></font>
	</tr>
</table>
</center>
</body>
</html>
