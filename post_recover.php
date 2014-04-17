<?php
	session_start();
?>
<html>
<body>
<?php
	include('menu.php');
	include('dbconnect.php');
	$email = trim($_POST['email']);
	echo $email;

?>
<font face = "century gothic">
<center>
</br>

<?php
	$query = "SELECT password FROM users WHERE email='$email'";
	$passwordMatch = mysqli_query($db,$query);
	$row = mysqli_fetch_array($passwordMatch);
	
	$password = $row[0];
	
	//email stuff here
	$to = $email;
	$subject = "IRB Password Recovery";
	$message = "
	
We are sorry that you forgot your password! We hope this makes life a little more convenient for you.


-----------------------------------------------
Your password is: $password
-----------------------------------------------

Thank you for using the IRB software! ";

	$headers = "From:noreply@umwirb.edu";
	mail($to, $subject, $message, $headers);
	header('Location: http://rosemary.umw.edu/~cshiffle/IRBRepos/login.php');
?>
</font>
</center>
</body>
</html>	
