<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #D7F3FF;"> 

	<?php 
		
		if(isset($_GET['difficulty'])){
			$gameDifficulty = $_REQUEST['difficulty'];
		}
		if(isset($_GET['round'])){
			$gameTurnNumber = $_REQUEST['round'];
		}
		if(isset($_GET['menorMayor'])){
			$gameMenorMayor = $_REQUEST['menorMayor'];
		} 
		if(isset($_GET['playerResponse'])){
			$gameLastResponse = $_REQUEST['playerResponse'];
		}
		if(isset($_GET['mayorMenor'])){
			$gameMayorMenor = $_REQUEST['mayorMenor'];
		}
		if(isset($_GET['oldNewNumber'])){
			$gameOldNewNumber = $_REQUEST['oldNewNumber'];
		}

		$gameNewNumber;
		if(!isset($_GET['round'])){
			if($gameDifficulty == 'niv1'){
				$gameTurnNumber = 9;
				$gameMenorMayor = 1024;
				$gameMayorMenor = 1;
				$gameNewNumber = rand(1, 1024);

			} elseif($gameDifficulty == 'niv2'){
				$gameTurnNumber = 15;
				$gameMenorMayor = 65536;
				$gameMayorMenor = 1;
				$gameNewNumber = rand(1, 65536);

			} elseif($gameDifficulty == 'niv3'){
				$gameTurnNumber = 19;
				$gameMenorMayor = 1048576;
				$gameMayorMenor = 1;
				$gameNewNumber = rand(1, 1048576);

			}

		}else{
			if($gameTurnNumber >0 ){	
				if($gameLastResponse == 'menor'){
					$gameMayorMenor = $gameOldNewNumber + 1 ;
				}elseif($gameLastResponse == 'mayor'){
					$gameMenorMayor =  $gameOldNewNumber - 1;
				}else{
					if($gameDifficulty == 'niv1'){
						$gameTurnNumberDiff = 9;
						
					} elseif($gameDifficulty == 'niv2'){
						$gameTurnNumberDiff = 15;
				
					} elseif($gameDifficulty == 'niv3'){
						$gameTurnNumberDiff = 19;
						
					}
					$durationTime = $gameTurnNumberDiff - $gameTurnNumber + 1;
					header('Location: fin.php?usedRounds='.$durationTime);
				}
				$gameTurnNumber = $gameTurnNumber -1;
				print("El numero es entre " . $gameMayorMenor . " y " . $gameMenorMayor);
				$gameNewNumber = rand( $gameMenorMayor ,$gameMayorMenor);
			} else {
				if($gameDifficulty == 'niv1'){
					$gameTurnNumberDiff = 9;
					$durationTime = $gameTurnNumberDiff - $gameTurnNumber + 1;
					header('Location: fin.php?usedRounds='.$durationTime);	
				} elseif($gameDifficulty == 'niv2'){
					$gameTurnNumberDiff = 15;
					$durationTime = $gameTurnNumberDiff - $gameTurnNumber + 1;
					header('Location: fin.php?usedRounds='.$durationTime);
				} elseif($gameDifficulty == 'niv3'){
					$gameTurnNumberDiff = 19;
					$durationTime = $gameTurnNumberDiff - $gameTurnNumber + 1;
					header('Location: fin.php?usedRounds='.$durationTime);
				} else {
				header('Location: jugar.php?difficulty=' . $gameDifficulty);
				}

			
			}
		}


		print('<h2>Es este tu numero = ' . $gameNewNumber . ' </h2><br>');

		print('<form action= "jugar.php" method="GET"> 
			<div> 
			Es Mayor a tu numero <input type="radio" value="mayor" name="playerResponse" checked><br> 
			Es Menor a tu numero <input type="radio" value="menor" name="playerResponse"><br> 
			Es Igual a tu numero <input type="radio" value="igual" name="playerResponse"><br>
			</div>
			<input type="hidden" name="menorMayor" value="' . $gameMenorMayor . '">
			<input type="hidden" name="mayorMenor" value="' . $gameMayorMenor . '">
			<input type="hidden" name="oldNewNumber" value="' . $gameNewNumber . '">
			<input type="hidden" name="round" value="' . $gameTurnNumber. '">
			<input type="hidden" name="difficulty" value="' . $gameDifficulty. '">');
			print('<input type="submit"> </form><br>');
		print('<button><a href="jugar.php?difficulty=' . $gameDifficulty . '">Reiniciar</a></button>
			<button><a href="index.php">Volver</a></button>')
	 ?>
</body>
</html>