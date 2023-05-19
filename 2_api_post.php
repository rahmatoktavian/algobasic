<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<?php 
			// API GET (list of city)
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: 8d923ad9ac9eb0ff0349a6885122d1f3"
				),
				CURLOPT_RETURNTRANSFER => true,
			));
			$json = curl_exec($curl);
			curl_close($curl);

			//convert json response into php array
			$data = json_decode($json, TRUE);
			$cityList = $data["rajaongkir"]["results"];
			
			// display raw data
			// print_r($list);
		?>
		
		<form method="post" action="2_api_post_result.php">
			<!-- display data become dropdown -->
			Origin
			<select name="origin_city">
				<?php foreach($cityList as $city):?>
				<option value="<?php echo $city["city_id"];?>"><?php echo $city["city_name"];?></option>
				<?php endforeach;?>
			</select>
			<br />

			<!-- display same data become other dropdown -->
			Destination
			<select name="destination_city">
				<?php foreach($cityList as $city):?>
				<option value="<?php echo $city["city_id"];?>"><?php echo $city["city_name"];?></option>
				<?php endforeach;?>
			</select>
			<br />
			<button>Display Cost</button>
		</form>

	</body>
</html>