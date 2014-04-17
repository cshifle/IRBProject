<html>
<body>

<?php 
//I guess we could just insert into a validate table the premil user info and set a column valid to n until they confirm then change to y
	include("menu.php"); 
	include "dbconnect.php";
	$email = $_POST['email'];
	$hash = $_POST['hash'];
?>

<font face = "century gothic">
<center>
</br>
</br>
<?php
	$query = "SELECT hash FROM users";
	$result = mysqli_query($db, $query) or die ("Error");
	$found = "false";
	while ($row = mysqli_fetch_array($result)) {
		$resultH = $row['hash'];
		//echo "<p>$resultH</p>";
		//echo "<p>POST HASH: ".$hash." AND DBHASH: ".$resultH."";
		if($hash == $row['hash']){
			$found = "true";
		}
	}
	if($found =="true"){
		$query="UPDATE users SET active = 'Y' WHERE email = '".$email."' AND hash = '".$hash."'";
		$result = mysqli_query($db, $query) or die ("Error updating");
		?>
			<font size = 6>Thank You for validating</font>
			Validation successful! You now have permissions to the IRB website!
		<?
	}
	else{
		echo "<font color = red>Validation unsuccessful, please re-enter the registration code.</font>";
		echo "</br><a href = \"validate.php\" style = \"text-decoration:none\">try again</a>";
	}
	?>

</br>

