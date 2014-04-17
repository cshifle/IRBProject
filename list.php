<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head><title>Submission list</title></head>
		
	<body>
	<?php
		include('dbconnect.php');
		if(!$db){
		echo "<p>Unable to connect to the database system</p>";
		exit();
		}
		$sql = "SELECT * FROM exemptApp";
		$query = mysql_query($sql) or die(mysql_error());

	?>
	<table border="1">
		<tr>
			<th>Title</th>
			<th>Sponsor</th>
			<th>Sponsor email</th>
			<th>Department</th>
			<th>Extension</th>
			<th>Student</th>
			<th>Studentemail</th>
			<th>Student Phone</th>
			<th>Graduate</th>
			<th>Date Signed</th>
		</tr>

	<?php
		while($row = mysql_fetch_assoc($query)){

			echo('<tr>');
			echo('<td>'.$row['title'].'</td>');
			echo('<td>'.$row['sponsor'].'</td>');
			echo('<td>'.$row['sponsorEmail'].'</td>');
			echo('<td>'.$row['department'].'</td>');
			echo('<td>'.$row['extension'].'</td>');
			echo('<td>'.$row['student'].'</td>');
			echo('<td>'.$row['studentEmail'].'</td>');
			echo('<td>'.$row['studentPhone'].'</td>');
			echo('<td>'.$row['graduate'].'</td>');
			echo('<td>'.$row['dateSigned'].'</td>');
			echo('</tr>');
		}
	?>
</table>

<p>
	<a href="http://validator.w3.org/check/referer">
	<img src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1!" height="31" width="88" /></a>
</p>
</body>
</html>
