
<html>
<body>

<?php 
include("menu.php");
include ('options_menu.php'); 
include "dbconnect.php";
?>
<font face = "century gothic">

</br>
<center>
<font size = "6">Validate</font>
<form method = "post" action = "post_adminValidate.php">
	<table border = "1" width = "70%" bordercolor = 000000 cellspacing = 0 cellpadding = 2>
	<tr bgcolor = FFFF99>
	<td> </td>
	<td><b>Name</b></td>
	<td><b>Email</b></td>
	<td><b>Permission</b></td>
	</tr>
	
<?php
$count = 0;
$query = "SELECT name, email, permission FROM users WHERE active = 'N' AND permission != 'student'";
$result = mysqli_query($db, $query) or die ("Error");
while ($row = mysqli_fetch_array($result)) {
	$count = $count +1;
	$name = $row['name'];
	$email = $row['email'];
	$permission = $row['permission'];
	//echo "<p>$</p>";
	//echo "<p>$resultP</p>";
?>
	<tr>
	<td><input type="checkbox" name="count[]" value= "<?php echo $name; ?>"></td>
	<td><?php echo $name ?></td>
	<td><?php echo $email ?></td>
	<td><?php echo $permission ?></td>	
	</tr>
<?php } ?>
	<input type="hidden" name="number" value= "<?php echo $count; ?>">
	</table>
	<input type=submit />
	</td>
</form>

<a href = "home.php" style = "text-decoration:none">home</a>

</center>
	
</body>
</html>
