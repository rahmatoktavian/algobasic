<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<?php
			// get data from previous screen
			$origin_city = $_POST["origin_city"];
			$destination_city = $_POST["destination_city"];

			// API POST (display delivery cost)
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					"key: 8d923ad9ac9eb0ff0349a6885122d1f3",
					"content-type: application/x-www-form-urlencoded"
				),
				//put data origin, destination & courier in this line
				CURLOPT_POSTFIELDS => "origin=".$origin_city."&destination=".$destination_city."&weight=100&courier=jne",
				//note : change jne into tiki / pos to display another courier cost

				CURLOPT_RETURNTRANSFER => true,
			));
			$json = curl_exec($curl);
			curl_close($curl);

			//convert json response into php array
			$data = json_decode($json, TRUE);
			$costList = $data["rajaongkir"]["results"][0]["costs"];
			
			// display json data
			// print_r($costList);
			// die;
		?>
		
		<ul>
			<?php foreach($costList as $cost):?>
			<li><?php echo $cost["service"];?> (<?php echo $cost["description"];?>) : Rp. <?php echo number_format($cost["cost"][0]["value"]);?> (Estimation : <?php echo $cost["cost"][0]["etd"];?> Days)</li>
			<?php endforeach;?>
		</ul>

	</body>
</html>