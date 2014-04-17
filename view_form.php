<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.php");
	}
	include('dbconnect.php');
?>

<html>
<body>

<?php include("menu.php"); ?>
<?php include ("options_menu.php"); ?>

<?php
	$email = $_SESSION['user'];
	$form = $_GET["form"];
	$id = $_GET["id"];

	$query = "SELECT title FROM $form WHERE id='$id'";
	$title = mysqli_query($db, $query);
	$row = mysqli_fetch_array($title);
	$title = $row[0];
	
	$query = "SELECT sponsor FROM $form WHERE id='$id'";
	$sponsor = mysqli_query($db, $query);
	$row = mysqli_fetch_array($sponsor);
	$sponsor = $row[0];
	
	$query = "SELECT sponsorEmail FROM $form WHERE id='$id'";
	$sponsorEmail = mysqli_query($db, $query);
	$row = mysqli_fetch_array($sponsorEmail);
	$sponsorEmail = $row[0];

	$query = "SELECT department FROM $form WHERE id='$id'";
	$department = mysqli_query($db, $query);
	$row = mysqli_fetch_array($department);
	$department = $row[0];

	$query = "SELECT extension FROM $form WHERE id='$id'";
	$phone = mysqli_query($db, $query);
	$row = mysqli_fetch_array($phone);
	$phone = $row[0];

	$query = "SELECT student FROM $form WHERE id='$id'";
	$student = mysqli_query($db, $query);
	$row = mysqli_fetch_array($student);
	$student = $row[0];

	$query = "SELECT studentEmail FROM $form WHERE id='$id'";
	$studentEmail = mysqli_query($db, $query);
	$row = mysqli_fetch_array($studentEmail);
	$studentEmail = $row[0];

	$query = "SELECT studentPhone FROM $form WHERE id='$id'";
	$phone2 = mysqli_query($db, $query);
	$row = mysqli_fetch_array($phone2);
	$phone2 = $row[0];

	if ($form == "expeditedApp")
	{
		$query = "SELECT abstract FROM $form WHERE id='$id'";
		$description = mysqli_query($db, $query);
		$row = mysqli_fetch_array($description);
		$description = $row[0];
	}	
?>

<font face = "century gothic">
<?php

	if($form == "exemptApp")
	{
		echo "<font size = 5><center>Exempt Application</font></center>";
	}
	else if($form == "expeditedApp")
	{
		echo "<font size = 5><center>Expedited Application</font></center>";
	}

?>

	<table border = "0">
	<tr>
	<td align = "right">
	<b>Title of Proposal:</b>
	</td><td>
	<?php echo "$title"; ?>
	</td><td>
	<tr><td align = "right">
	<b>Faculty Member:</b>
	</td><td>
	<?php echo "$sponsor"; ?>
	</td></td>
	<tr><td align = "right">
	<b>Faculty Member Email:</b>
	</td><td>
	<?php echo "$sponsorEmail"; ?>
	</td><td>
	<tr><td align = "right">
	<b>Department:</b>
	</td><td>
	<?php echo "$department"; ?>
	</td></td>
	<tr><td align = "right">
	<b>Phone:</b>
	</td><td>
	<?php echo "$phone"; ?>
	</td><td>
	<tr><td align = "right">
	<b>Student:</b>
	</td><td>
	<?php echo "$student"; ?>
	</td></td>
	<tr><td align = "right">
	<b>Student Email:</b>
	</td><td>
	<?php echo "$studentEmail"; ?>
	</td><td>
	<tr><td align = "right">
	<b>Student Phone:</b>
	</td><td>
	<?php echo "$phone2"; ?>
	</td></td>
	<tr><td align = "right">
<?php
	if ($form == "expeditedApp")
	{
		echo "<b>Description:</b>";
		echo "</td><td>";
		echo "$description";
	}

?>
	</td></td>
	</table>
</br>
<?php
	//Faculty approve or deny applications
	$user = $_SESSION['user'];
	$query = "SELECT permission FROM users WHERE email = $user";
	$row = mysqli_fetch_array($permission);
	$permission = $row[0];
	if($permission == 'faculty'){
?>
	<form name="input" method="post" action="sponsorApp.php">
	<input type = "submit" value = "Approve" class="submitButton" />
	<form name="input" method="post" action="denyApp.php">
	<input type = "submit" value = "Deny" class = "submitbutton"/>
<?php
	}
?>
<center><a href="profile.php" style = "text-decoration:none">back</a> | <a href="home.php" style = "text-decoration:none">home</a><center>
</body>
</html>


