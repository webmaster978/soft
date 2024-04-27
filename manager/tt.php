<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,
								initial-scale=1.0">
	<title>Show/Hide Div based on Select Option</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="inputs">
		<div class="input">
			<label for="selectLabel">Div-1: </label>
			<select id="select1" onchange="toggleDiv()">
				<option value="show">Abonnee</option>
				<option value="hide">Hide</option>
			</select>
		</div>

		<div class="input">
			<label for="selectLabel">Div-2: </label>
			<select id="select2" onchange="toggleDiv()">
				<option value="show">Show</option>
				<option value="hide">Hide</option>
			</select>
		</div>

		<div class="input">
			<label for="selectLabel">Div-3: </label>
			<select id="select3" onchange="toggleDiv()">
				<option value="show">Show</option>
				<option value="hide">Hide</option>
			</select>
		</div>

	</div>

	<div class="container">
		<div id="one" class="box">
			<p>This is visible when show in div 1</p>
		</div>

		<div id="two" class="box">
			<p>This is visible when show in div 2</p>
		</div>

		<div id="three" class="box">
			<p>This is visible when show in div 3</p>
		</div>
	</div>

	<script src="script.js"></script>

</body>

</html>
