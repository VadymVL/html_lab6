<?php
echo ((isset($_POST["first_name"]))?$_POST["first_name"]:"");
echo("<br>");
echo ((isset($_POST["last_name"]))?$_POST["last_name"]:"");
echo("<br>");
echo ((isset($_POST["email"]))?$_POST["email"]:"");
echo("<br>");
echo ((isset($_POST["password"]))?$_POST["password"]:"");
echo("<br>");
echo ((isset($_POST["gender"]))?$_POST["gender"]:"");
echo("<br>");
echo ((isset($_POST["lang"]))?$_POST["lang"]:"");
echo("<br>");
echo ((isset($_POST["checkbox"]))?$_POST["checkbox"]:"");
echo("<br>");
?>

<!DOCTYPE html>

<script src="check.js"></script>

<html>
<head>
	<title>
		Title
	</title>
	<link rel="stylesheet" href="style.css"></link>
</head>

<body>
	<center>
		<div class="parent">
		<div class="child">
			<font id="errorLog" style="background:#FFFF99; color:red;"></font>
			<br>
			<fieldset>
			<legend>Register</legend>
				<form method="POST" name="mainform" id="mainform" action="#">
					<font><span style="color:red;">*</span> - required fields</font>
					<br>
					<div align="left">First name:<span><span class="required">*</span></div>
					<input type="text" name="first_name" id="first_name" placeholder="John"></input>
					<br>
					<div align="left">Last name:<span><span class="required">*</span></div>
					<input type="text" name="last_name" id="last_name" placeholder="Doe"></input>
					<br>
					<div align="left">E-mail:<span><span class="required">*</span></div>
					<input type="text" name="email" id="email" placeholder="john_doe@email.com"></input>
					<br>
					<div align="left">Password:<span><span class="required">*</span></div>
					<input type="password" name="password" id="password"></input>
					<br>
					<div align="left">Gender:<span class="required">*</span></div>
					<div id="gender_group_border">
					<input type="radio" name="gender" value="M">Male</input>
					<input type="radio" name="gender" value="F">Female</input>
					</div>
					<br>
					<div align="left">Language:<span><span class="required">*</span></div>
					<select name="lang">
						<option value="null" disabled selected>Select...</option>
						<option value="eng">English</option>
						<option value="ger">German</option>
						<option value="ukr">Ukrainian</option>
						<option value="spa">Spanish</option>
					</select>
					<p>
					<div id="checkbox_terms_border">
					<input type="checkbox" name="checkbox" id="checkbox">I'm agree with terms.</input><span class="required">*</span>
					</div>
					<p>
					<input type="reset" value="Reset"></input>
					<input type="button" onClick="check();" value="Submit"></input>
					<br>
				</form>
			</fieldset>
		</div>
		</div>
	</center>
</body>
</html>


<?php


?>