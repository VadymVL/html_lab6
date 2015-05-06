<?php
echo ((isset($_POST["name"]))?$_POST["name"]:"");
echo("<br>");
echo ((isset($_POST["password"]))?$_POST["password"]:"");
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
			<font id="errorLog" style="background:yellow; color:red;"></font>
			<br>
			<fieldset>
			<legend>Legend</legend>
				<form method="POST" name="mainform" id="mainform" action="#">
					<input type="text" name="name" id="name" placeholder="Your name"></input>
					<br>
					<input type="password" name="password" id="password" placeholder="password" ></input>
					<br>
					<input type="reset"></input>
					<br>
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