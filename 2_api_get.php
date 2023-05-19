<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<?php 
			// single array
			// $list =  ["Audi", "BMW", "Mercedes", "Volvo"];

			// API
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
			$list = $data["rajaongkir"]["results"];
			
			// display raw data
			// print_r($list);
		?>
		
		<!-- display data become dropdown -->
		Province
		<select>
			<?php foreach($list as $data):?>
			<option value="<?php echo $data["province_id"];?>"><?php echo $data["province"];?></option>
			<?php endforeach;?>
		</select>
	</body>
</html>