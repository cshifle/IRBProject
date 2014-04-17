<?php
session_start();
include("menu.php"); 
include ("options_menu.php"); 
include "dbconnect.php";
$countExp = $_POST['countExpedited'];
$countExe =$_POST['countExempt'];

$sesName=$_POST['name'];
$sesPermission=$_POST['permission'];
if ($_POST['update'] == 'Approve') {
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
	$aNameExe = $_POST["countExempt"];
	$aNameExp = $_POST["countExpedited"];
	if(empty($aNameExe) && empty($aNameExp)){
		echo "You didn't approve anyone";
	} else {

		$nExe = count($aNameExe);
		$nExp = count($aNameExp);
		$n=$nExe+$nExp;
		echo $n ." people selected";
		for($i=0; $i<$nExe; $i++) {
			echo "<br/>Approved ".$aNameExe[$i];
			if($sesPermission =='faculty') {
				$query="UPDATE exemptApp SET facultyStatus = 'Y' WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query ="SELECT user FROM exemptApp WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error in exempt faculty approved");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Approved by Faculty"; // Give the email a subject  
				$message = " 

					Congratulations! Your application titled ".$aNameExe[$i]." has been approved by your faculty sponsor. You will be notified once an IRB member approves or denies your application."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  


			}				
			if($sesPermission =='member') {
				$query="UPDATE exemptApp SET memberStatus = 'Y' WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");

				$query = "SELECT studentEmail FROM exemptApp WHERE memberAssigned= '$sesName'";
				$result = mysqli_query($db, $query);
				$query="UPDATE exemptApp SET status = 'approved' WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query = "SELECT user FROM exemptApp WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Approved by IRB"; // Give the email a subject  
				$message = " 

					Congratualtions! Your application titled ".$aNameExe[$i]." has been approved by an IRB member."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
				$query = "SELECT sponsorEmail FROM exemptApp WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Approved by IRB"; // Give the email a subject  
				$message = " 

					Congratulations! Your sponsored application titled ".$aNameExe[$i]." has been approved."; // Our message above including the link  

				$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  

			}
		}


		for($i=0; $i<$nExp; $i++) {
			echo "<br/>Approved ".$aNameExp[$i];
			if($sesPermission =='faculty') {
				$query="UPDATE expeditedApp SET facultyStatus = 'Y' WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");

				$query = "SELECT memberAssigned FROM expeditedApp WHERE sponsorEmail = '$sesName'";
				$result = mysqli_query($db, $query);
				$query ="SELECT user FROM expeditedApp WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Approved by Faculty"; // Give the email a subject  
				$message = " 

					Congratulations! Your application titled ".$aNameExp[$i]." has been approved by your faculty sponsor. You will be notified once an IRB member approves or denies your application."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  

			}		
			if($sesPermission =='member') {
				$query="UPDATE expeditedApp SET memberStatus = 'Y' WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");

				$query = "SELECT studentEmail FROM expeditedApp WHERE memberAssigned= '$sesName'";
				$result = mysqli_query($db, $query);
				$query="UPDATE expeditedApp SET status = 'approved' WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query = "SELECT user FROM expeditedApp  WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Approved by IRB"; // Give the email a subject  
				$message = " 

					Congratualtions! Your application titled ".$aNameExp[$i]." has been approved by an IRB member."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
				$query = "SELECT sponsorEmail FROM expeditedApp WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Approved by IRB"; // Give the email a subject  
				$message = " 

					Congratulations! Your sponsored application titled ".$aNameExp[$i]." has been approved."; // Our message above including the link  

				$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  



			}
		}
	}

} else if ($_POST['update'] == 'Deny') {
	?> 
		</br>
		<font face = "century gothic">
		<center>
		<font size = 6>Thank you for updating</font>
		</br>
		</br>
		<font color = red>
		<?php
		$track = 0;

	$aNameExe = $_POST["countExempt"];
	$aNameExp = $_POST["countExpedited"];
	if(empty($aNameExe) && empty($aNameExp)){
		echo "You didn't deny anyone";
	} else {

		$nExe = count($aNameExe);
		$nExp = count($aNameExp);
		$n=$nExe+$nExp;
		echo $n ." people selected";
		for($i=0; $i<$nExe; $i++) {
			echo "<br/>Denied ".$aNameExe[$i];
			if($sesPermission =='faculty') {
				$query="UPDATE exemptApp SET facultyStatus = 'N' WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");

				$query = "SELECT memberAssigned FROM exemptApp WHERE sponsorEmail = '$sesName'";
				$result = mysqli_query($db, $query);
				$query = "SELECT user FROM exemptApp  WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Denied by Faculty Sponsor"; // Give the email a subject  
				$message = " 

					Unfortunately, your application titled ".$aNameExe[$i]." has been denied by the faculty sponsor."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
			}
			if($sesPermission =='member') {
				$query="UPDATE exemptApp SET memberStatus = 'N' WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query = "SELECT studentEmail FROM exemptApp WHERE memberAssigned= '$sesName'";
				$result = mysqli_query($db, $query);
				$query="UPDATE exemptApp SET status = 'approved' WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query = "SELECT user FROM exemptApp  WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Denied by IRB"; // Give the email a subject  
				$message = " 

					Unfortunately, your application titled ".$aNameExe[$i]." has been denied by the IRB."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
				$query = "SELECT sponsorEmail FROM exemptApp  WHERE title = '".$aNameExe[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Denied by IRB"; // Give the email a subject  
				$message = " 

					Unfortunately, your application titled ".$aNameExe[$i]." has been denied by the IRB."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  

			}
		}

		for($i=0; $i<$nExp; $i++) {
			echo "<br/>Rejected ".$aNameExp[$i];
			if($sesPermission =='faculty') {
				$query="UPDATE expeditedApp SET facultyStatus = 'N' WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query = "SELECT user FROM expeditedApp  WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Denied by Faculty Sponsor"; // Give the email a subject  
				$message = " 

					Unfortunately, your application titled ".$aNameExp[$i]." has been denied by the faculty sponsor."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
			}
			if($sesPermission =='member') {
				$query="UPDATE expeditedApp SET memberStatus = 'Y' WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$query = "SELECT user FROM expeditedApp  WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Denied by IRB"; // Give the email a subject  
				$message = " 

					Unfortunately, your application titled ".$aNameExp[$i]." has been denied by the IRB."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
				$query = "SELECT user FROM expeditedApp  WHERE title = '".$aNameExp[$i]."'";
				$result = mysqli_query($db, $query) or die ("Error");
				$result = mysqli_fetch_array($result);
				$result = $result[0];
				$to      = $result; // Send email to our user  
				$subject = " Application Denied by IRB"; // Give the email a subject  
				$message = " 

					Unfortunately, your application titled ".$aNameExp[$i]." has been denied by the IRB."; // Our message above including the link  

					$headers = "From:noreply@umwirb.edu"; // Set from headers  
				mail($to, $subject, $message, $headers); // Send our email  
			}
		}
	}
}

?>
</font>
</br>
</br>
<a href = "profile.php" style = "text-decoration:none">back</a> | <a href = "home.php" style = "text-decoration:none">home</a>
