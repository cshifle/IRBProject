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
<font face = "century gothic">
<?php
$email = $_SESSION['user'];

//$query = "SELECT permission FROM users WHERE email='$email'";
//$permission = mysqli_query($db, $query);
//$row = mysqli_fetch_array($permission);
//$permission = $row[0];

	include "options_menu.php";

$query = "SELECT name FROM users WHERE email='$email'";
$name = mysqli_query($db, $query);
$row = mysqli_fetch_array($name);
$name = $row[0];

?>

<center>
<font size = "5">Profile</font>
	<table border = "0">
	<tr>
	<td align = "right">
	<b>Name:</b>
	</td><td>
	<?php echo "$name" ?>
	</td><td>
	<tr><td align = "right">
	<b>Email:</b>
	</td><td>
	<?php echo "$email" ?>
	</td><td>
	<tr><td align = "right">
	<b>Status:</b>
	</td><td>
	<?php echo "$permission" ?>
	</td></tr>
	</table>
</font>

</body>
</br>

	<?php
	$query = "SELECT * FROM exemptApp WHERE user='$email' ORDER BY date DESC";
	$apps = mysqli_query($db, $query);
	
	if ($permission=='student') {
	?>
		<font size = 4><b>Exempt Forms:</b></font>
		</br>
		<table border = "1" width = "70%" bordercolor = 000000 cellspacing = 0 cellpadding = 2>
		<tr bgcolor = FFFF99>
		<td><b>Title</b></td>
		<td><b>Date Submitted</b></td>
		<td><b>Sponsor</b></td>
		<td><b>Department</b></td>
		<td><b>Status of Application</b></td>
		</tr>
		<tr>
	<?php		
		while ($row = mysqli_fetch_array($apps))
		{
			$tempId = $row['id'];
			$title = $row['title'];
			$status = $row['status'];
			$sponsor = $row['sponsor'];
			$department = $row['department'];
			$date = $row['date'];

			echo "<td><a href = \"view_form.php?form=exemptApp&id=$tempId\" style = \"text-decoration:none\">$title</a></td>";
			echo "<td>$date</td>";
			echo "<td>$sponsor</td>";
			echo "<td>$department</td>";
			echo "<td>$status</td>";
			echo "</tr>";

		}
	?>
		</table>
		</br>
		
		<font size = 4><b>Expedited Forms:</b></font>
		</br>
		<table border = "1" width = "70%" bordercolor = 000000 cellspacing = 0 cellpadding = 2>
		<tr bgcolor = FFFF99>
		<td><b>Title</b></td>
		<td><b>Date Submitted</b></td>
		<td><b>Sponsor</b></td>
		<td><b>Department</b></td>
		<td><b>Status of Application</b></td>
		</tr>
		<tr>

	<?php
		$query = "SELECT * FROM expeditedApp WHERE user='$email' ORDER BY date DESC";
		$apps = mysqli_query($db, $query);
	
		while ($row = mysqli_fetch_array($apps))
		{
			$tempId = $row['id'];
			$title = $row['title'];
			$status = $row['status'];
			$sponsor = $row['sponsor'];
			$department = $row['department'];
			$date = $row['date'];
			
			echo "<td><a href = \"view_form.php?form=expeditedApp&id=$tempId\" style = \"text-decoration:none\">$title</a></td>";
			echo "<td>$date</td>";
			echo "<td>$sponsor</td>";
			echo "<td>$department</td>";
			echo "<td>$status</td>";
			echo "</tr>";
		}
	?>
		</table>
	
	<?php
	}
	if ($permission=='faculty') {
	//echo "Faculty  status";
	?>
		<font size = "5"><b>Sponsor Approve / Deny</b></font>
		<form method = "post" action = "forward.php">
		<table border = "1" width = "60%" bordercolor = 000000 cellspacing = 0 cellpadding = 2>
		<tr bgcolor = FFFF99>
		<td> </td>
		<td><b>Title</b></td>
		<td><b>Application</b></td>
		<td><b>Student<b></td>
		<td><b>Department</b></td>
		</tr>
		<tr>
	<?php 
		$count = 0;
		$query = "SELECT * FROM exemptApp WHERE sponsorEmail='$email' AND facultyStatus ='P'";
		$result = mysqli_query($db, $query) or die ("Error");
		while ($row = mysqli_fetch_array($result))
		{
			$tempId = $row['id'];
			$count = $count +1;
			$title = $row['title'];
			$student = $row['student'];
			$department = $row['department'];
			$app = "Exempt";
	?>
			<td><input type="checkbox" name="countExempt[]" value= "<?php echo $title; ?>"></td>
			<td><a href = "view_form.php?form=exemptApp&id=<?php echo $tempId; ?>" style = "text-decoration:none"><?php echo $title; ?></a></td>
			<td><?php echo $app ?></td>		
			<td><?php echo $student ?></td>
			<td><?php echo $department ?></td>
			</tr>
	<?php 
		}
  
		$query = "SELECT * FROM expeditedApp WHERE sponsorEmail='$email' AND facultyStatus ='P'";
		$result = mysqli_query($db, $query) or die ("Error");
		while ($row = mysqli_fetch_array($result))
		{
			$count = $count +1;
			$tempId = $row['id'];
			$title = $row['title'];
			$student = $row['student'];
			$department = $row['department'];
			$app = "Expedited";
	?>
			<tr>
			<td><input type="checkbox" name="countExpedited[]" value= "<?php echo $title; ?>"></td>
			<td><a href = "view_form.php?form=expeditedApp&id=<?php echo $tempId; ?>" style = "text-decoration:none"><?php echo $title; ?></a></td>
			<td><?php echo $app ?></td>
			<td><?php echo $student ?></td>	
			<td><?php echo $department ?></td>	
			</tr>
			<tr>
	<?php
		}
	?>
			</table>
	<?php 
		if($count !=0) {
	?> 
			<input type="hidden" name ="number" value= "<?php echo $count; ?>">
			<input type ="hidden" name="name" value = "<?php echo $email; ?>">
			<input type ="hidden" name="permission" value = "<?php echo $permission; ?>">
			<input type=submit name ="update" value="Approve"/>
			<input type=submit name ="update" value="Deny"/>
	<?php 
		} 
	} 
	?>

	<?php 
		if ($permission=='member') {
	?>
		<font size = "5"><b>Application Approve / Deny</b></font>
		<form method = "post" action = "forward.php">
		<table border = "1" width = "60%" bordercolor = 000000 cellspacing = 0 cellpadding = 2>
		<tr bgcolor = FFFF99>
		<td> </td>
		<td><b>Title</b></td>
		<td><b>Application</b></td>
		<td><b>Student</b></td>
		<td><b>Sponsor</b></td>
		<td><b>Department</b></td>
		</tr>
	<?php 
		$count = 0;
		$query = "SELECT * FROM exemptApp WHERE memberAssigned='$email' AND memberStatus ='P' AND facultyStatus='Y'";
		$result = mysqli_query($db, $query) or die ("Error");
		while ($row = mysqli_fetch_array($result)) 
		{
			$count = $count +1;
			$tempId = $row['id'];
			$title = $row['title'];
			$student = $row['student'];
			$app = "Exempt";
			$sponsor = $row['sponsor'];
			$department = $row['department'];
	?>
			<tr>
			<td><input type="checkbox" name="countExempt[]" value= "<?php echo $title; ?>"></td>
			<td><a href = "view_form.php?form=exemptApp&id=<?php echo $tempId; ?>" style = "text-decoration:none"><?php echo $title ?></a></td>
			<td><?php echo $app ?></td>
			<td><?php echo $student ?></td>
			<td><?php echo $sponsor ?></td>
			<td><?php echo $department ?></td>
			</tr>
	<?php 
		}  
		$query = "SELECT * FROM expeditedApp WHERE memberAssigned='$email' AND memberStatus ='P' AND facultyStatus='Y'";
		$result = mysqli_query($db, $query) or die ("Error");
		while ($row = mysqli_fetch_array($result))
		{
			$count = $count +1;
			$tempId = $row['id'];
			$title = $row['title'];
			$student = $row['student'];
			$app = "Expedited";
			$sponsor = $row['sponsor'];
			$department = $row['department'];
	?>
			<tr>
			<td><input type="checkbox" name="countExpedited[]" value= "<?php echo $title; ?>"></td>
			<td><a href = "view_form.php?form=expeditedApp&id=<?php $tempId; ?>" style = "text-decoration:none"><?php echo $title ?></a></td>
			<td><?php echo $app ?></td>
			<td><?php echo $student ?></td>
			<td><?php echo $sponsor ?></td>
			<td><?php echo $department ?></td>
			</tr>
	<?php 
		}
	?>
			</table>
	<?php 
		if($count !=0) 
		{
	?> 
			<input type="hidden" name ="number" value= "<?php echo $count; ?>">
			<input type ="hidden" name="name" value = "<?php echo $email; ?>">
			<input type ="hidden" name="permission" value = "<?php echo $permission; ?>">
			<input type=submit name ="update" value="Approve"/>
			<input type=submit name ="update" value="Deny"/>
	<?php 
		} 
	} 
	?>
</table>

<center>
</form>
</br>
<a href = "home.php" style = "text-decoration:none">home</a>
</center>
</font>
</body>
</html>


