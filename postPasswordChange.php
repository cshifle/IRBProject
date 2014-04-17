<?php
	include("menu.php");
	$name=$_POST['name'];
?>
<html>
<body>

<?php
	include('dbconnect.php');
	$email = $_POST['email'];
	$currentPW = $_POST['oldPass'];
	$newPass1 = $_POST['newPass'];
	$newPass2 = $_POST['newPass2'];
	$query = "SELECT password FROM users WHERE email = '$email'";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_array($result);
	$currentPassActual = $row[0];
	if($newPass1 == $newPass2 && $currentPassActual == $currentPW){
		$query = "UPDATE users SET password = '$newPass1' WHERE email = '$email'";
		$result = mysqli_query($db, $query); 
		header('Location: http://rosemary.umw.edu/~cshiffle/IRBRepos/home.php');
	}
	else{
		header('Location: http://rosemary.umw.edu/~cshiffle/IRBRepos/changePassword.php');
		echo "Your passwords don't match or you entered an incorrect current password! Please re-enter!";
	}
?>

</html>
</body>
