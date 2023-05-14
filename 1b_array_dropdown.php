<!DOCTYPE html>
<html>
	<head>
		<title>Practical Algorithm</title>
	</head>
	<body>
		<p>Static</p>
		<select>
			<option>1-Audi</option>
			<option>2-BMW</option>
			<option>3-Mercedes</option>
			<option>4-BMW</option>
		</select>

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
		<select>
			<?php foreach($list as $data):?>
			<!-- combine data : variable."string".variable -->
			<option><?php echo $data["id"]."-".$data["name"];?></option>
			<?php endforeach;?>
		</select>
	</body>
</html>