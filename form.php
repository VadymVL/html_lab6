<?php
echo '<pre>'; var_dump($_POST); echo '</pre>';

$first_name = $last_name = $email = $password = $language = $checkbox = $gender = "";
$first_name_Error = $last_name_Error = $email_Error = $password_Error = $language_Error = $checkbox_Error = $gender_Error = ""; //error flags
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_form"]) ) { //check request method, and if submit_form variable is able in the responce array
	//checkForEmpty();
	//validate();
	echo "POST not null<br>";
	
	if(empty($_POST["first_name"])) {
		$first_name_Error = "Firsr name is required!";
		echo "name is null<br>";
	} else {
		$first_name = checkInput($_POST["first_name"]);
		//if(preg_match("\d", $first_name)) {
		//	$first_name_Error = "First name must contain only letters!";
		//}
		echo "name is ".$first_name."<br>";
		 if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
			$first_name_Error = "Only letters and white space allowed"; 
		}
	}
} else {
	echo "POST is null<br>";
	if($_SERVER["REQUEST_METHOD"] == "POST") { echo "POST <br>"; } else { echo "NO POST <br>"; }
	if(isset($_POST["submit_form"]) ) { echo "submit_form <br>"; } else { echo "NO submit_form <br>"; }
}

$last_name_Error = "oplaod";

function checkInput($input) {
  $input = trim($input); //remove spaces and new line symbols
  $input = stripslashes($input); //remove esc slashes
  $input = htmlspecialchars($input); //remove html tags to prevent XSS attacks
  return $input; //return checked string
}

/*echo ((isset($_POST["first_name"]))?$_POST["first_name"]:"");
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
echo("<br>");*/


function showErrorMessages() {
	$result = "1";
	global $first_name_Error, $last_name_Error, $email_Error, $password_Error, $language_Error, $checkbox_Error, $gender_Error;
	if(!empty($first_name_Error)) $result .= $first_name_Error;// . "<br>";
	if(!empty($last_name_Error)) $result .= $last_name_Error;// . "<br>";
	//if(!empty($email_Error)) $result .= $email_Error . "<br>";
	//if(!empty($password_Error)) $result .= $password_Error . "<br>";
	//if(!empty($language_Error)) $result .= $language_Error . "<br>";
	//if(!empty($checkbox_Error)) $result .= $checkbox_Error . "<br>";
	//if(!empty($gender_Error)) $result .= $gender_Error . "<br>";
	return $result;
}

echo showErrorMessages();
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

<body onLoad="checkJS()">
	<center>
		<div class="parent">
		<div class="child">
			<font id="errorLog"><?php echo (showErrorMessages()); ?></font>
			<br>
			<fieldset>
			<legend>Register</legend>
				<form method="POST" name="mainform" id="mainform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<font><span style="color:red;">*</span> - required fields</font>
					<br>
					<div align="left">First name:<span><span class="required">*</span></div>
					<input type="text" name="first_name" id="first_name" placeholder="John" value="<?php echo ($first_name);?>" <?php if(!empty($first_name_Error)) echo ('class="error"');?>></input>
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
					<input type="radio" name="gender" id="gender_male" value="M"><label for="gender_male">Male</label></input>
					<input type="radio" name="gender" id="gender_female"value="F"><label for="gender_female">Female</label></input>
					</div>
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
					<input type="checkbox" name="checkbox" id="checkbox"><label for="checkbox">I'm agree with terms.</label></input><span class="required">*</span>
					</div>
					<p>
					<input type="reset" value="Reset"></input>
					<input type="button" name="submit_button" id="submit_button" onClick="check();" value="Submit" style="display:none"; form="mainform"></input>
					<noscript><input type="submit" value="Submit" name="submit_button"></input></noscript>
					<input type="hidden" name="submit_form" value="submit_form"></input> <!-- Flag indicates, that post request came from this form page-->
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