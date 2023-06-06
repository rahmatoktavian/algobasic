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
			
			// create array to hold cost for multiple courier
			$costListAll = [];

			// API POST JNE
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
				CURLOPT_RETURNTRANSFER => true,
			));
			$json = curl_exec($curl);
			curl_close($curl);

			//convert json response into php array
			$data = json_decode($json, TRUE);
			$costListJNE = $data["rajaongkir"]["results"][0]["costs"];
			
			//insert JNE cost in cost list All
			foreach($costListJNE as $cost) {
				$costListAll[] = array(
									'service' => 'JNE - '.$cost['service'],
									'description' => $cost['description'],
									'cost' => $cost['cost'][0]['value'],
									'etd' => $cost['cost'][0]['etd']
								);
			}

			// API POST TIKI
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					"key: 8d923ad9ac9eb0ff0349a6885122d1f3",
					"content-type: application/x-www-form-urlencoded"
				),
				//put data origin, destination & courier in this line
				CURLOPT_POSTFIELDS => "origin=".$origin_city."&destination=".$destination_city."&weight=100&courier=tiki",
				CURLOPT_RETURNTRANSFER => true,
			));
			$json = curl_exec($curl);
			curl_close($curl);

			//convert json response into php array
			$data = json_decode($json, TRUE);
			$costListTIKI = $data["rajaongkir"]["results"][0]["costs"];

			//insert JNE cost in cost list All
			foreach($costListTIKI as $cost) {
				$costListAll[] = array(
									'service' => 'TIKI - '.$cost['service'],
									'description' => $cost['description'],
									'cost' => $cost['cost'][0]['value'],
									'etd' => $cost['cost'][0]['etd']
								);
			}
			
			// API POST POS
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_HTTPHEADER => array(
					"key: 8d923ad9ac9eb0ff0349a6885122d1f3",
					"content-type: application/x-www-form-urlencoded"
				),
				//put data origin, destination & courier in this line
				CURLOPT_POSTFIELDS => "origin=".$origin_city."&destination=".$destination_city."&weight=100&courier=pos",
				CURLOPT_RETURNTRANSFER => true,
			));
			$json = curl_exec($curl);
			curl_close($curl);

			//convert json response into php array
			$data = json_decode($json, TRUE);
			$costListPOS = $data["rajaongkir"]["results"][0]["costs"];

			//insert POS cost in cost list All
			foreach($costListPOS as $cost) {
				$costListAll[] = array(
									'service' => 'POS - '.$cost['service'],
									'description' => $cost['description'],
									'cost' => $cost['cost'][0]['value'],
									// 'etd' => str_replace('HARI', '', $cost['cost'][0]['etd'])
									'etd' => $cost['cost'][0]['etd'],
								);
			}

			// display json data
			print_r($costListAll);
			die;
		?>
		
		<table border="1">
			<thead>
				<tr>
					<th>Service</th>
					<th>Description</th>
					<th>Cost</th>
					<th>Estimated Day</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($costListAll as $cost):?>
			<tr>
				<td><?php echo $cost["service"];?></td>
				<td><?php echo $cost["description"];?></td>
				<td>Rp. <?php echo number_format($cost["cost"]);?></td>
				<td><?php echo $cost["etd"];?></tr></td>
			<?php endforeach;?>
			</tbody>
		</table>

	</body>
</html>