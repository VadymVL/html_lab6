<?php
$first_name = $last_name = $user_name = $email = $lang = $gender = "";

session_start();
echo '<pre>'; print_r ($_SESSION); echo '</pre>';

if(isset($_SESSION['first_name'])){
    $first_name = $_SESSION['first_name'];//display the message
	$user_name .=  $first_name;
    unset($_SESSION['first_name']);//clear the value so that it doesn't display again
}
if(isset($_SESSION['last_name'])){
    $last_name = $_SESSION['last_name']; 
	$user_name .=  " " . $last_name;
    unset($_SESSION['last_name']); 
}
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    unset($_SESSION['email']);
}
if(isset($_SESSION['gender'])){
    $gender = $_SESSION['gender'];
	if($gender === "M") $gender = "male";
	if($gender === "F") $gender = "female";
    unset($_SESSION['gender']);
}
if(isset($_SESSION['lang'])){
    $lang = $_SESSION['lang'];
	switch($lang) {
		case "eng": $lang="English"; break;
		case "ger": $lang="German"; break;
		case "ukr": $lang="Ukrainian"; break;
		case "spa": $lang="Spanish"; break;
	}
    unset($_SESSION['lang']);
}
?>

<!DOCTYPE html>

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
			<br>
			<fieldset>
			<legend><h3>Registration has successfully completed!</h3></legend>
			<h2>
				Hello, <?php echo ((!empty($user_name))?$user_name:"New User");?>!
				<br>
				Your email is <?php echo ((!empty($email))?$email:"good");?>!
				<br>
				Your gender is <?php echo ((!empty($gender))?$gender:"secret"); echo " and your language is "; echo ((!empty($lang))?$lang:"interesting");?>!
			</h2>
			</fieldset>
		</div>
		</div>
	</center>
</body>
</html>