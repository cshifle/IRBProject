<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.php");
	}
	include ( 'menu.php' );	
	include ("options_menu.php");
?>
<HTML>
<H2>Application for <u>EXEMPT STATUS</u> for research involving the use of human subjects</H2>
<p> ALL APPLICATIONS MUST BE ACCOMPANIED BY PROOF OF ETHICS TRAINING FOR EACH INVESTIGATOR INVOLVED IN THE RESEARCH. NOTE:Studies invloving interactions (anything other than observations) with vulnerable populations (e.g., children, prisoners, or pregnant women), experimental manipulation, deception, or audio or video recordings of participants can NOT be exempt.</p>
<form name="login" method="post" action="exemptForm1.php">
<p> TITLE OF PROPOSAL : <input type="text" name="title" />
<p> Faculty member : <input type="text" name="sponsor" />
<p> Faculty email : <input type="text" name="sponsorEmail" />
<p> Department : <input type="text" name="department" />
<p> Phone : <input type="text" name="phone" />
<p> Student : <input type="text" name="student" />
<p> Student email : <input type="text" name="studentEmail" />
<p> Student phone : <input type="text" name="studentPhone" />
<p>I/We certify that the above research project involves human subjects only in one or more of the following categories, and will be carried out using standard methods. (Please check all appropriate numbers)</p>
<input type = "checkbox" name="qualifications" value="1" />Research conducted in established or commonly accepted educational settings, involving normal educational practices, such as (a) research on regular and special education instructional strategies, or (b) research on the effectiveness of or the comparison among instructional techniques, curricula, or classroom management methods.
<br/>
<br/>
<input type="checkbox" name="qualifications" value="2" />Research involving the use of educational tests (cognitive, diagnostic, aptitude, achievement), survey procedures, interview procedures or observation of public behavior unless: (a) information obtained is recorded in such a manner that human subjects can be identified, directly or through identifiers linked to the subjects; and (b) any disclosure of the human subjects' responses outside the research could reasonably place the subjects at risk of criminal or civil liability or be damaging to the subjects' financial standing, employability, or reputation.
<br/>
<br/>
<input type="checkbox" name="qualifications" value="3" />Research involving the use of educational tests (cognitive, diagnostic, aptitude, achievement), survey procedures, interview procedures, or observation of public behavior that is not exempt under paragraph (2) of this section, if: (a) the human subjects are elected or appointed public officials or candidates for public office; or (b) federal statute(s) require(s) without exception that the confidentiality of the personally identifiable information will be maintained throughout the research and thereafter.
<br/>
<br/>
<input type="checkbox" name="qualifications" value="4" />Research involving the collection or study of existing data, documents, records, pathological specimens, or diagnostic specimens, if these sources are publicly available or if the information is recorded by the investigator in such a manner that subjects cannot be identified, directly or through identifiers linked to the subjects. [Note: To qualify for this exemption ALL of the data, documents, records, or specimens must be in existence before the project begins.]
<br/>
<br/>
<input type="checkbox" name="qualifications" value="5" />Research and demonstration projects which are conducted by or subject to the approval of department or agency heads, and which are designed to study, evaluate, or otherwise examine: (a) public benefit or service programs; (b) procedures of obtaining benefits or services under those programs; (c) possible changes in or alternatives to those programs or procedures; or (d) possible changes in methods or levels of payment for benefits or services under those programs.
<br/>
<br/>
<input type="checkbox" name="qualifications" value="6" /> The research (taste and food quality or consumer acceptance) involves wholesome foods with no additives or invloves foods with ingredients (type and amount) that meet federal safety standards.
<br/>
<br/>
RATIONALE FOR EXEMPTION. Review pp. 7-8 of the Manual of Policies and Procedures for the Institutional Review Board at the University of Mary Washington. After doing so, please describe briefly the proposed research and explain, in non-technical language, why you believe this research should be exempted from IRB review. If you state that participants will be anonymous, please note how anonymity will be ensured. Please attach any questionnaires, informed consent documents, or debriefing statements you plan to administer.
<br/>
<br/>
<b>By submitting this application the student agrees that the information provided is valid.</b>
<br/>
<br/>
<input type="submit" value="Submit Application" class="submitButton" />
</form>
</HTML>
