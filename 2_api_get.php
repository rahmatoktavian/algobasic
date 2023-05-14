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
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.rajaongkir.com/starter/province?key=8d923ad9ac9eb0ff0349a6885122d1f3");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$json = curl_exec($ch); 
			$data = json_decode($json, TRUE);
			$list = $data["rajaongkir"]["results"];
			curl_close($ch);  
			
			// display raw data
			// print_r($data);
		?>
		<br />
		Province
		<select>
			<?php foreach($list as $data):?>
			<option value="<?php echo $data["province_id"];?>"><?php echo $data["province"];?></option>
			<?php endforeach;?>
		</select>
	</body>
</html>