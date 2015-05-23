<?php
header("Content-type: text/html; charset=windows-1251");  //Using correct encoding fro Ukrainian anrussian characters
echo '<pre>original POST:<br>'; var_dump($_POST); echo '</pre>';

if(isset($_POST["text"])) { 

$text = $_POST["text"];
$result = "";

$textArray = explode(" ", $text);
echo '<pre>textArray from POST string:<br>'; var_dump($textArray); echo '</pre>';

foreach($textArray as $word) {

	$charArray = str_split($word);
	$arrayLength = strlen($word);
	
	echo '<pre>word char Array:<br>'; var_dump($charArray); echo '</pre>'."length:".$arrayLength."<br>";
	
	for($i = 0; $i < $arrayLength/2; $i++) {
		$temp = $charArray[$i];
		$charArray[$i] =  $charArray[$arrayLength - 1 - $i]; //-1 for index match
		$charArray[$arrayLength - 1 - $i] = $temp;
	}
	
	$revert = implode($charArray);//converts Array to String
	echo "revert word:<br>".$revert."<br>";
	$result .= $revert . " ";//add to result string
}

echo "result:<br>".$result."<br>";
}
?>

<!DOCTYPE html>

<html>

<head>
	<title>
		Words
	</title>
	<link rel="stylesheet" href="style.css"></link>
</head>

<body>
	<div class="parent">
		<div class="child">
			<fieldset>
				<legend>Input your text here</legend>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<textarea name="text" rows="7" cols="25"><?php if(!empty($result)) echo $result; ?></textarea>
					<br>
					<input type="reset" value="Reset"></input>
					<input type="submit" value="Submit"></input>
				</form>			
			</fieldset>
		</div>
	</div>
</body>

</html>