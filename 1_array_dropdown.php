<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<p>Static</p>
		<select>
			<option>Audi</option>
			<option>BMW</option>
			<option>Mercedes</option>
			<option>BMW</option>
		</select>

		<p>Dynamic</p>
		<?php 
			// single array
			$list =  ["Audi", "BMW", "Mercedes", "Volvo"];
		?>
		<select>
			<?php foreach($list as $data):?>
			<option><?php echo $data;?></option>
			<?php endforeach;?>
		</select>
	</body>
</html>