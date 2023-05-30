<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<?php 
			$original_data = [
				['name'=>'Napoli', 'league'=>'Serie A'],
				['name'=>'Man City', 'league'=>'EPL'],
				['name'=>'Real Madrid', 'league'=>'La Liga'],
				['name'=>'Barcelona', 'league'=>'La Liga'],
				['name'=>'Juventus', 'league'=>'Serie A'],
				['name'=>'AC Milan', 'league'=>'Serie A'],
			];

			$grouped_data = [];
			foreach($original_data as $index=>$item) {
				$name = $item['name'];
				$league = $item['league'];

				if(!empty($grouped_data[$league])) {
					$grouped_data[$league] += 1;
				} else {
					$grouped_data[$league] = 1;
				}
			}
		?>

		<p>Original Data (2 Dimension Array)</p>
		<table border="1">
			<thead>
				<tr>
					<th>League</th>
					<th>Total Club</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($original_data as $original):?>
			<tr>
				<td><?php echo $original['name'];?></td>
				<td><?php echo $original['league'];?></td>
			<?php endforeach;?>
			</tbody>
		</table>

		<br /><br />
		<p>Grouped Data (1 Dimension Array)</p>
		<table border="1">
			<thead>
				<tr>
					<th>League</th>
					<th>Total Club</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($grouped_data as $league=>$club):?>
			<tr>
				<td><?php echo $league;?></td>
				<td><?php echo $club;?></td>
			<?php endforeach;?>
			</tbody>
		</table>

	</body>
</html>