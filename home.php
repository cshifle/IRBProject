<?php
	session_start();
	include('dbconnect.php');
?>
<html>
<body>

<?php include("menu.php"); ?>
<?php include ("options_menu.php"); ?>
<font face = "century gothic">

<?php
	if(!isset($_SESSION['user'])){
		header("Location: login.php");
	}

	//Checks for faculty permissions to view student applications
	$user = $_SESSION['user'];
	$query = "SELECT permission FROM users WHERE email = $user";
	$permission = mysqli_query($db, $query);
	$row = mysqli_fetch_array($permission);
	$permission = $row[0];

	if($permission == 'faculty'){
		$query2 = "SELECT * FROM exemptApp WHERE sponsorEmail = $user";
		$apps = mysqli_query($db, $query2);
		while($row = mysqli_fetch_array($apps)){
			$tempId = $row['id'];
			$title = $row['title'];
			echo "<a href = \"view_form.php?form=exemptApp&id=$tempId\">$title</a></br>";
			
		}
	}
?>
</br><center><font size = 5>
Welcome to University of Mary Washington's </br> Institutional Review Board homepage!</font>
</br>
</br>
<table border = "0" width = 650>
	<tr>
	<td><center>Any research involving human subjects by a member of the campus community (faculty, students, staff) must, by federal and state regulations, be reviewed and approved by a group known as the Institutional Review Board (IRB). The University's IRB now has a document which details the policies and procedures that will apply to human subjects research at UMW.</center></td>
	</tr>
</table>
</center>
</font>
</body>
</html>


