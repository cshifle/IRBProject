<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.php");
	}
?>
<html>
<body>

<?php include("menu.php"); ?>
<?php include ("options_menu.php"); ?>
<font face = "century gothic">

</br>
<font size = 6><center>Submission Successful!</center></font>
<center></br><a href = "home.php" style = "text-decoration: none">home</a></center>
</font>
</body>
</html>


