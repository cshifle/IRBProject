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
<center>
<font face = "century gothic">
<font color = red>

<font size = 5>
</br>
	<table border = "1" width = "50%" bordercolor = 000000 cellspacing = 0 cellpadding = 2>
	<tr bgcolor = FFFF99>
	<td><b>Form</b></td>
	<td><b>Description</b></td>
	</tr>
	<tr>
	<td><a href = "exemptForm.php" style = "text-decoration:none">Exempt Form</a></td>
	<td>
		The application for exempt status first asks you to identify why your research meets exempt criteria by placing it into an appropriate category. The following examples of common exempt research may help you decide if your research is indeed exempt.
		<ul>
		<li>Example: You are teaching two sections of a general course. You use Powerpoint slides in only one section and compare the final exam scores between the two sections. (Category 1)</li>
		<li>Example: You observe the behavior of children playing at the park. You are simple observing, not video or audio taping, and not using names of the children. (Category 2)</li>
		<li>Example: You interview members of the state legislature to determine if gender plays a role in view on health care spending. (Category 3)</li>
		<li>Example: You use divorce records to look at regional patterns of divorce rates. (Category 4)</li>
		</ul>
	</td>
	</tr>
	<tr>
	<td><a href = "expeditedForm.php" style = "text-decoration:none">Expedited Form</a></td>
	<td>
		Any reasearch involving human subjects and the research does not fall into any of the exempt status categories must complete the expedited application.	
	</td>
	</tr>
	</table>
</font>
</br>
<a href = "home.php" style = "text-decoration:none" >home</a>
</center>
</font>
</body>
</html>


