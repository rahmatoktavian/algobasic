<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<p>Static</p>
		<table border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Audi</td>
				</tr>
				<tr>
					<td>2</td>
					<td>BMW</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Mercedes</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Volvo</td>
				</tr>
			</tbody>
		</table>

		<p>Dynamic</p>
		<?php 
			// multi dimension array
			$list =  [
						["id"=>1, "name"=>"Audi"],
						["id"=>2, "name"=>"BMW"],
						["id"=>3, "name"=>"Mercedes"],
						["id"=>4, "name"=>"Volvo"]
					];
		?>
		<table border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $data):?>
				<tr>
					<td><?php echo $data["id"];?></td>
					<td><?php echo $data["name"];?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>

	</body>
</html>