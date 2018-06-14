<?php 

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://08ad1pao69.execute-api.us-east-1.amazonaws.com/dev/random_ten");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	// curl_setopt($ch, CURLOPT_HEADER, array('Content-Type:application/json'));

	$response = curl_exec($ch);
	$response = json_decode($response, true);
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jokes</title>
</head>
<body>
	<h1>Your Jokes</h1>
	
	<table border="1">
		<tr>
			<th>type of joke</th>
			<th>setup</th>
			<th>punchline</th>
		</tr>
		<?php
			foreach ($response as $joke):
	?>
		<tr>
			<td><?php echo $joke['type'] ?></td>
			<td><?php echo $joke['setup'] ?></td>
			<td><?php echo $joke['punchline'] ?></td>
		</tr>
		<?php 
			endforeach;
			// echo"<pre>";
			// print_r($response);
			// echo "</pre>";	
			echo $err = curl_error($ch);
			curl_close($ch);
		 ?>
		
	</table>
</body>
</html>