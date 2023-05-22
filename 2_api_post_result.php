<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<?php
			// get data from previous screen
			$origin_city = 151;//$_POST["origin_city"];
			$destination_city = 114;//$_POST["destination_city"];

			// API POST (display delivery cost)
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					"key: 8d923ad9ac9eb0ff0349a6885122d1f3",
					"content-type: application/x-www-form-urlencoded"
				),
				CURLOPT_POSTFIELDS => "origin=".$origin_city."&destination=".$destination_city."&weight=100&courier=jne",
				CURLOPT_RETURNTRANSFER => true,
			));
			$json = curl_exec($curl);
			curl_close($curl);

			//convert json response into php array
			$data = json_decode($json, TRUE);
			$costList = $data["rajaongkir"]["results"][0]["costs"];
			
			// display raw data
			// print_r($costList);
		?>
		
		<ul>
			<?php foreach($costList as $cost):?>
			<li><?php echo $cost["description"];?> : Rp</li>
			<?php endforeach;?>
		</ul>

	</body>
</html>