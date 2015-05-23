<?php
header("Content-type: text/html; charset=windows-1251");  // So the browser doesn't make our lives harder
echo '<pre>'; var_dump($_POST); echo '</pre>';

if(!isset($_POST["text"])) exit();

$text = $_POST["text"];
$result = "";

$textArray = explode(" ", $text);
echo '<pre>'; var_dump($textArray); echo '</pre>';

foreach($textArray as $word) {
	echo $word."<br>";
	$charArray = mb_str_split($word);
	$arrayLength = strlen($word);
	
	echo '<pre>'; var_dump($charArray); echo '</pre>'.$arrayLength;
	
	
	for($i = 0; $i < $arrayLength/2; $i++) {
		$temp = $charArray[$i];
		if(!preg_match("/^[a-zA-Z0-9]+$/", $temp)) continue; //ctype_alnum as alternative - check for alphanumeric charaters
		$charArray[$i] = $charArray[$arrayLength - 1 - $i]; //-1 for index match
		$charArray[$arrayLength - 1 - $i] = $temp;
	}
	
	$revert = implode($charArray);//converts Array to String
	echo $revert."<br>";
	$result .= $revert . " ";//add to result string
}

echo $result."<br>";


function mb_str_split( $string ) { //multibite for ukrainian and cyrillic encoding characters
    # Split at all position not after the start: ^ and not before the end: $ 
    //return preg_split('/(?<!^)(?!$)/u', $string );
	//return preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);	
	$results = array();
	preg_match_all('/./u', $string, $results);
	var_dump($results[0]);
	return $results;
}
?>