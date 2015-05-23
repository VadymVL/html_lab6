<?php
echo '<pre>'; var_dump($_POST); echo '</pre>';
$form_is_empty = true;
$first_name = $last_name = $email = $password = $language = $checkbox = $gender = "";
$first_name_Error = $last_name_Error = $email_Error = $password_Error = $language_Error = $checkbox_Error = $gender_Error = ""; //error flags
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_form"]) ) { //check request method, and if submit_form variable is able in the responce array

	$form_is_empty = false;
	//name
	if(empty($_POST["first_name"])) {
		$first_name_Error = "Firsr name is required!";
	} else {
		$first_name = checkInput($_POST["first_name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
			$first_name_Error = "Only letters and white space are allowed in the First name field!"; 
		}
	}
	
	//last_name
	if(empty($_POST["last_name"])) {
		$last_name_Error = "Last name is required!";
	} else {
		$last_name = checkInput($_POST["last_name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
			$last_name_Error = "Only letters and white space are allowed in the Last name field!"; 
		}
	}
	
	//email
	if(empty($_POST["email"])) {
		$email_Error = "Email is required!";
	} else {
		$email = checkInput($_POST["email"]);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL); //remove all illegal characters, that left
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email_Error = "Your email must be a valid address!"; 
		}
	}
	
	//password
	if(empty($_POST["password"])) {
		$password_Error = "Password is required!";
	} else {
		$password = checkInput($_POST["password"]);
		if (strlen($password) < 6) {
			$password_Error = "Password must be more then 6 characters!"; 
		}
	}
	
	//gender
	if(empty($_POST["gender"])) {
		$gender_Error = "Gender is required!";
	} else {
		$gender = checkInput($_POST["gender"]);
		if($gender !== "F" && $gender !== "M") {
			$gender_Error = "Gender must be Male or Female!"; 
		}
	}
	
	//language
	if(empty($_POST["lang"])) {
		$language_Error = "Language is required!";
	} else {
		$language = checkInput($_POST["lang"]);
		if($language !== "eng" && $language !== "ger" && $language !== "ukr" && $language !== "spa") {
			$language_Error = "Language must be have chosen from the list!"; 
		}
	}
	
	//checkbox
	if(empty($_POST["checkbox"])) {
		$checkbox_Error = "Terms checkbox is required!";
	} else {
		$checkbox = checkInput($_POST["checkbox"]);
	}
	
} else { 
	$form_is_empty = true;
}

function checkInput($input) {
  $input = trim($input); //remove spaces and new line symbols
  $input = stripslashes($input); //remove esc slashes
  $input = htmlspecialchars($input); //remove html tags to prevent XSS attacks
  return $input; //return checked string
}

function showErrorMessages() {
	$result = "";
	global $first_name_Error, $last_name_Error, $email_Error, $password_Error, $language_Error, $checkbox_Error, $gender_Error;
	global $form_is_empty;
    global $first_name, $last_name, $email, $password, $language, $checkbox, $gender;
	
	if(!empty($first_name_Error)) $result .= $first_name_Error . "<br>";
	if(!empty($last_name_Error)) $result .= $last_name_Error . "<br>";
	if(!empty($email_Error)) $result .= $email_Error . "<br>";
	if(!empty($password_Error)) $result .= $password_Error . "<br>";
	if(!empty($gender_Error)) $result .= $gender_Error . "<br>";
	if(!empty($language_Error)) $result .= $language_Error . "<br>";
	if(!empty($checkbox_Error)) $result .= $checkbox_Error . "<br>";
	
	if(strlen($result) == 0 && $form_is_empty !== true) {
		session_start();
		$_SESSION["first_name"] = $first_name;
		$_SESSION["last_name"] = $last_name;
		$_SESSION["email"] = $email;
		$_SESSION["gender"] = $gender;
		$_SESSION["lang"] = $language;
		header('Location: user.php');
        exit;
	} else {
		return $result;
	}
}
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
					<input type="text" name="last_name" id="last_name" placeholder="Doe" value="<?php echo ($last_name);?>" <?php if(!empty($last_name_Error)) echo ('class="error"');?>></input>
					<br>
					<div align="left">E-mail:<span><span class="required">*</span></div>
					<input type="text" name="email" id="email" placeholder="john_doe@email.com" value="<?php echo ($email);?>" <?php if(!empty($email_Error)) echo ('class="error"');?>></input>
					<br>
					<div align="left">Password:<span><span class="required">*</span></div>
					<input type="password" name="password" id="password" <?php if(!empty($password_Error)) echo ('class="error"');?>></input>
					<br>
					<div align="left">Gender:<span class="required">*</span></div>
					<div id="gender_group_border" <?php if(!empty($gender_Error)) echo ('class="error"');?>>
					<input type="radio" name="gender" id="gender_male" value="M" <?php if(empty($gender_Error) && $gender === "M") echo ('checked');?>><label for="gender_male">Male</label></input>
					<input type="radio" name="gender" id="gender_female"value="F" <?php if(empty($gender_Error) && $gender === "F") echo ('checked');?>><label for="gender_female">Female</label></input>
					</div>
					<div align="left">Language:<span><span class="required">*</span></div>
					<select name="lang" <?php if(!empty($language_Error)) echo ('class="error"');?>>
						<option value="null" disabled <?php if(!empty($language_Error) || $form_is_empty) echo ('selected');?>>Select...</option>
						<option value="eng" <?php if(empty($language_Error) && $language === "eng") echo ('selected');?>>English</option>
						<option value="ger" <?php if(empty($language_Error) && $language === "ger") echo ('selected');?>>German</option>
						<option value="ukr" <?php if(empty($language_Error) && $language === "ukr") echo ('selected');?>>Ukrainian</option>
						<option value="spa" <?php if(empty($language_Error) && $language === "spa") echo ('selected');?>>Spanish</option>
					</select>
					<p>
					<div id="checkbox_terms_border" <?php if(!empty($checkbox_Error)) echo ('class="error"');?>>
					<input type="checkbox" name="checkbox" id="checkbox" <?php if(empty($checkbox_Error) && !empty($checkbox)) echo ('checked');?>><label for="checkbox">I'm agree with terms.</label></input><span class="required">*</span>
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