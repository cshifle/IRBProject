<?php
session_start();
include("dbconnect.php");
include("menu.php");
include("options_menu.php");

$user = $_SESSION['user'];
$title = $_POST['title'];
$sponsor = $_POST['sponsor'];
$sponsorEmail = $_POST['sponsorEmail'];
$department = $_POST['department'];
$phone = $_POST['phone'];
$student = $_POST['student'];
$studentemail = $_POST['studentEmail'];
$studentphone = $_POST['studentPhone'];
?>

<html>
<body>
<?php
/*echo $title;
echo "sponsor: " .$sponsor. " <br />";
echo "sponsorEmail: " .$sponsorEmail ." <br />";
echo "department: " .$department . " <br />";
echo "phone: " .$phone . " <br />";
echo "student: " .$student . " <br />";
echo "studentemail: " .$studentemail . " <br />";
echo "studentphone: " .$studentphone . " <br />";

*/
$query = "SELECT permission FROM users WHERE email = '$sponsorEmail'";
$permissionMatch = mysqli_query($db, $query) or die("Error Retrieving Data");
$row = mysqli_fetch_array($permissionMatch);
$thePermission = $row[0];
echo $thePermission;
   if($thePermission == "faculty"){
	$to = $sponsorEmail;
	$subject = "Submitted Application | Notification for action";
	$message = $studentemail . " has submitted an application for approval.  Please log in to the IRB software and take time to review and act  upon this application.";//Message within the email
	$headers = "From:notify@umwirb.edu"; //set the header
	mail($to, $subject, $message, $headers);//send the email
}
else{
	echo "This is not a valid faculty member email address.";
}
$query = "SELECT assignedApps, email FROM users WHERE permission='member' GROUP BY assignedApps ASC LIMIT 1";
$memberAssigned = mysqli_query($db, $query);
$row = mysqli_fetch_array($memberAssigned);
$memberAssigned = $row['email'];

$status = "pending";
$facultyStatus = "P";
$memberStatus = "P";

$query = "INSERT INTO exemptApp (user, date, title, sponsor, sponsorEmail, department, extension, student, studentEmail, studentPhone, status, facultyStatus, memberStatus, memberAssigned) VALUES ('$user', CURRENT_TIMESTAMP, '$title', '$sponsor', '$sponsorEmail', '$department', '$phone', '$student', '$studentemail', '$studentphone', '$status', '$facultyStatus', '$memberStatus', '$memberAssigned')";

$result = mysqli_query($db, $query);

$query = "UPDATE users SET assignedApps=(assignedApps+1) WHERE email='$memberAssigned'";
$result = mysqli_query($db, $query);

header("Location: post_submit.php");

?>
</body>
</html>
