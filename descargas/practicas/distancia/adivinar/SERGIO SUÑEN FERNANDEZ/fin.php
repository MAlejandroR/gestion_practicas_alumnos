<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #D7F3FF;"> 

	<?php

		$gameRounds = $_REQUEST['usedRounds'];

		print('<h2> He acertado!!! en ' . $gameRounds . ' jugadas </h2>')

	?>
	<button><a href="index.php">Reiniciar</a></button>
</body>
</html>