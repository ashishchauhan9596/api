<!DOCTYPE html>
<html>
<head>
	<title>new tester</title>
</head>
<body>
	<?php
		$response = file_get_contents('http://thecatapi.com/api/images/get?format=xml&results_per_page=83');

		$xml = simplexml_load_string($response);
		$json = json_encode($xml); 
		$array = json_decode($json,TRUE);
		$arrlength = sizeof($array,1);
		// echo $arrlength;
		// die();
		for($x = 0; $x < $arrlength; $x++) { ?>
			<img src="<?php echo $array['data']['images']['image'][$x]['url']; ?>">
			<?php
		echo "<br>";
		}
	?>
</body>
</html>