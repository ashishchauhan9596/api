<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="test2.php" method="post">
		<label>Enter IP address</label><br>
		<input type="text" name="ipadd"><br><br>
		<input type="submit" name="submit" value="Find Details">
	</form>
	<?php 
		if (isset($_POST['submit'])) :
		$ipaddress = $_POST['ipadd'];
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.apility.net/geoip/".$ipaddress,
		CURLOPT_RETURNTRANSFER => true,
		// CURLOPT_TIMEOUT => 30,
		// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// CURLOPT_CUSTOMREQUEST => "POST",
		// CURLOPT_HTTPHEADER => array(
		// "cache-control: no-cache"
		// ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		

		$response = json_decode($response, true);

		?>
		<table border="1">
			<tr>
				<th>Country</th>
				<th>Latitude</th>
				<th>Continent Name</th>
				<th>Region</th>
				<th>Region Name</th>
				<th>Time Zone</th>
				<th>Longitude</th>
				<th>Network Service Provider</th>
			</tr>
			<tr>
				<td><?php echo $response['ip']['country_names']['en'] ?></td>
				<td><?php echo $response['ip']['latitude'] ?></td>
				<td><?php echo $response['ip']['continent_names']['es'] ?></td>
				<td><?php echo $response['ip']['region'] ?></td>
				<td><?php echo $response['ip']['city_names']['en']?></td>
				<td><?php echo $response['ip']['time_zone'] ?></td>
				<td><?php echo $response['ip']['longitude'] ?></td>
				<td><?php echo $response['ip']['as']['name'] ?></td>
			</tr>
		</table>

	<?php 
		// echo "<pre>";
		// print_r($response);
		// echo "</pre>";
		curl_close($curl);

	endif;

	?>
</body>
</html>