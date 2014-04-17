<?php
	include("menu.php"); 
	$name = $_POST['name'];
	$_SESSION['name'] = $name;
?>
<html>
<body>

<br/>
<br/>


<?php
	include('dbconnect.php');
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$password2 = $_POST['pass2'];
	$active = 'N';
	$permission = $_POST['role'];
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
?>
		<font face ="century gothic">
		<center>
		<font size = 6>You must register with a valid umw email address. i.e. test@mail.umw.edu</font>
		<br />
	<?php
	}
	else{	
	if ( ($password == $password2) && ($permission=='student'))
	{
		$_SESSION['registerUser'] = 'student';
?>
<?php
		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.  
						 // Example output: f4552671f8909587cf485ea990207f3b 
	      $to      = $email; // Send email to our user  
 	      $subject = "IRB Signup | Verification"; // Give the email a subject  
   	      $message = " 
     
 Thanks for signing up! 
 Your account has been created, you may log in after a few more steps!  Just click the link below and you will be redirected to another page.  Enter the code attatched to this email and your information will be validated! 
     
    ------------------------ 
    Email: ".  $email ." 
    Registration Code: ". $hash ."
    ------------------------ 
     
    Please click this link to activate your account: 
     
    http://rosemary.umw.edu/~clewis2/IRBSite/validate.php "; // Our message above including the link  
      
		$headers = "From:noreply@umwirb.edu"; // Set from headers  
 	         mail($to, $subject, $message, $headers); // Send our email  
	
		
		$insert = "INSERT INTO users (name, email, password, permission, hash, active) VALUES ( '$name', '$email', '$password', '$permission', '$hash', '$active')";
		$result = mysqli_query($db, $insert) or die ("Error inserting"); 
		mysqli_close($db);
		
		header("Location: post_register2.php");
		
	}
	else if ( ($password == $password2) && ($permission!='student'))
	{
		$_SESSION['registerUser'] = 'other';
?>
<?php

		$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.  
						 // Example output: f4552671f8909587cf485ea990207f3b 
	      $to      = 'clewis2@mail.umw.edu'; // Send email to our user  
 	      $subject = "IRB Signup | Verification"; // Give the email a subject  
   	      $message =  
     
 		$name ." has registered as a ". $permission .". Please validate this user at http://rosemary.umw.edu/~clewis2/IRBSite/validate.php "; // Our message above including the link  
      
		$headers = "From:noreply@umwirb.edu"; // Set from headers  
 	         mail($to, $subject, $message, $headers); // Send our email  
	
		
		$insert = "INSERT INTO users (name, email, password, permission, hash, active) VALUES ( '$name', '$email', '$password', '$permission', '$hash', '$active')";
		$result = mysqli_query($db, $insert) or die ("Error inserting"); 
		mysqli_close($db);
		
		header("Location: post_register2.php");
		
	}
	else {
		echo "Passwords do not match";
	}
}
?>
</font>
</center>

</body>
</html>
