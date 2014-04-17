
<html>
<body>

<?php 
//I guess we could just insert into a validate table the premil user info and set a column valid to n until they confirm then change to y
	include("menu.php");
	include("options_menu.php"); 
	include "dbconnect.php";
	$count =$_POST['count'];
?>

</br>
<font face = "century gothic">
<center>
<font size = 6>Thank You for validating</font>
</br>
</br>
<font color = red>
<?php
	$track = 0;
	$query = "SELECT name, email, permission FROM users WHERE active = 'N' AND permission != 'student'";
	$result = mysqli_query($db, $query) or die ("Error");
	while ($row = mysqli_fetch_array($result)) {
		$name = $row['name'];
	//	echo "Outside of if  ".$name;
		//if (isset($_POST['$count'])) {
	/*		echo "Count is set.";
			if ($_POST['$count']=='$name') {
				echo "Found name ".$name;
				$query="UPDATE users SET active = 'Y' WHERE name = '".$name."'";
				$result = mysqli_query($db, $query) or die ("Error");
			}
	*/
	}
			$aName = $_POST["count"];
			if(empty($aName)){
				echo "You didn't approve anyone";
			} else {

				$n = count($aName);
				echo $n ." people selected";
				for($i=0; $i<$n; $i++) {
					echo "</br>Approved ".$aName[$i];
					$query="UPDATE users SET active = 'Y' WHERE name = '".$aName[$i]."'";
					$result = mysqli_query($db, $query) or die ("Error");
				}
			}
		//}

?>
</font>
</br>
</br>
<a href = "adminValidate.php" style = "text-decoration:none">back</a> | <a href = "home.php" style = "text-decoration:none">home</a>

