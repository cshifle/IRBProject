<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.php");
	}
	include ( 'menu.php' );	
	include ("options_menu.php");
?>
<HTML>
<H2>Application for <u>EXPEDITED STATUS</u> for research involving the use of human subjects</H2>
<br/>
<br/>
(NOTE: This cover sheet must be filed with all applications. For applications needing full Board approval, only one copy of this cover sheet needs to be filed. (Throughout the application, applicants are referred to relevant sections of the Manual of Policies and Procedures for the Institutional Review Board at the University of Mary Washington. Any person conducting research with human subjects should be familiar with the Manual.) ALL APPLICATIONS MUST BE ACCOMPANIED BY PROOF OF ETHICS TRAINING FOR EACH INVESTIGATOR INVOLVED IN THE RESEARCH.
<br/>
<br/>
<form name="login" method="post" action="expeditedForm1.php">
<p> TITLE OF PROPOSAL : <input type="text" name="title" />
<p> Faculty member : <input type="text" name="sponsor" />
<p> Faculty email : <input type="text" name="sponsorEmail" />
<p> Department : <input type="text" name="department" />
<p> Phone : <input type="text" name="phone" />
<p> Student : <input type="text" name="student" />
<p> Student email : <input type="text" name="studentEmail" />
<p> Student phone : <input type="text" name="studentPhone" />
<p> Brief Abstract (Describe your study in less than 150 words) : <input type="text" name="abstract" maxlength="255" />
<p> 
<input type="submit" value="Submit Application" class="submi
tButton" />
</form>
</HTML>
