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
				['name'=>'Liverpool', 'league'=>'EPL'],
			];

			// new variable for container
			$grouped_data = [];

			//looping original data
			foreach($original_data as $index=>$item) {
				$name = $item['name'];
				$league = $item['league'];

				// second, third & next club 
				if(!empty($grouped_data[$league])) {
					$grouped_data[$league] += 1;

				// first club
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
					<th>Club</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($original_data as $original):?>
			<tr>
				<td><?php echo $original['league'];?></td>
				<td><?php echo $original['name'];?></td>
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
		
		<!-- display chart -->
		<div id="container"></div>

		<!-- config chart -->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>
		<script>
			Highcharts.chart('container', {
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false,
					type: 'pie'
				},
				title: {
					text: 'Pie Chart Example',
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				accessibility: {
					point: {
						valueSuffix: '%'
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						}
					}
				},
				series: [{
					name: 'Brands',
					colorByPoint: true,
					data: [
							// original data
							// {
							// 	name: 'Chrome',
							// 	y: 60,
							// }, 
							// {
							// 	name: 'Edge',
							// 	y: 50
							// },  
							// {
							// 	name: 'Firefox',
							// 	y: 40
							// },

							<?php foreach($grouped_data as $league=>$club):?>
							{
								name: '<?php echo $league;?>',
								y: <?php echo $club;?>
							},
							<?php endforeach;?>

							
						]
				}]
			});
		</script>
	</body>
</html>