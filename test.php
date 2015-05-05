<?php

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
		<div>
			<fieldset>
			<legend>Legend</legend>
				<form name="mainform" id="mainform" action="test.php" onSubmit="check();">
					<input type="text" name="name" id="name"></input>
					<br>
					<input type="password" name="password" id="password"></input>
					<br>
					<input type="reset"></input>
					<br>
					<input type="submit" onClick="check();"></input>
					<br>
					<input type="button" onClick="check(this);"></input>
				</form>
			</fieldset>
		</div>
	</center>
</body>
</html>


<?php


?>