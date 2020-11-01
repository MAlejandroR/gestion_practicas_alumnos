<!DOCTYPE html>
<html>
<head>

    <style>
		.topdiv {
		  	background-color: #BBD3E9;
		  	width: 100%;
		  	height: 100px;
		}
		.h1Text {
			padding-top: 2%;
		}
		.leftdiv{
			background-color: #BBD3E9;
		  	width: 48%;
		  	margin-top: 1%;
		  	float: left;
		}
		.rightdiv{
			background-color: #BBD3E9;

		  	width: 50%;
		  	margin-top: 1%;
		  	float: right;
		}
		tbody tr td {
 			 border: 1px solid black;
		}
		td{
			    padding:0 15px 0 15px;
		}
	</style>
	<title></title>
</head>
<body style="background-color: #D7F3FF;">
	<?php

	$contactListName = array();
	$contactListPhone = array();
	$contName;
	$showErrorMessage = false;
	$listSize = 0;
	if(isset($_POST['contAdd'])){
		if(isset($_POST['contListName']) && isset($_POST['contListPhone'])){

			$contactListName = explode(', ', $_POST['contListName']);
			$contactListPhone = explode(', ', $_POST['contListPhone']);
		}
		if(isset($_POST['contName']) && strlen($_POST['contName']) > 1) {
			$showErrorMessage = false;

            if(in_array($_POST['contName'], $contactListName)){
				if($_POST['contPhone'] < 1){
					$position = array_search($_POST['contName'], $contactListName);
					unset($contactListName[$position]);
					unset($contactListPhone[$position]);
				} else {
					$position = array_search($_POST['contName'], $contactListName);
					$contactListPhone[$position] = $_POST['contPhone'];
				}
			}else if(isset($_POST['contPhone']) && $_POST['contPhone'] > 0 ){
                array_push($contactListName, $_POST['contName']);
				array_push($contactListPhone, $_POST['contPhone']);
			}

		} else{
			$showErrorMessage = true;
		}

	}
		print('<div class="topdiv"> 
		
		<h2 align="center" class="h1Text"> Actualmente hay ');
		if(isset($contactListName)){
			$listSize = count($contactListName);
		}
		print($listSize);
		print(' contactos <h2>

	</div>
		<tr> 
			
		<div>
			<td>
				<div class="leftdiv"> 
					<form action="index_.php" method="POST"> 
						<h4>Nombre: </h4> <input type="text" name="contName" value = " "><br>
						<h4>Numero: </h4> <input type="number" name="contPhone" min="1" max="999999999">
						<br>
						<br>
						<input type="submit" name="contAdd" value="Añadir contacto">&nbsp;&nbsp;
						<input type="submit" name="contRemove" value="Borrar contatos">');
		if(!empty($contactListName) && !empty($contactListPhone)){

				print_r('<input type ="hidden" name = "contListName" value = "' . implode(', ', $contactListName) . '">
						<input type ="hidden" name = "contListPhone" value = "' . implode(', ', $contactListPhone). '">');

			}

		print('
						<br>');
		if($showErrorMessage){
		print('<font color= "red"><h3>El nombre no puede estar vacio.</h3></font>');
		}

		print('<br>
				<br>
				</form>

				</div>
			</td>
			<td>	
				<div class="rightdiv"> 
					<h3>Contactos:</h3>
					<br> <br>
					<table>
					<thead> 
					<tr> <td>Nombre<hr color="black" size=2></td> <td>Numero<hr color="black" size=2></td> </tr>
					</thead>
					');
		if(!empty($contactListName) && !empty($contactListPhone)){
			for ($i=0; $i < count($contactListName); $i++) {
				print('<tr> 
						<td>'. $contactListName[$i] .' </td>
						<td>'. $contactListPhone[$i] .' </td>
						</tr>');

			}
		}
		print('
					</table>
				</div>
			</td>
		</tr>
	</div>');



	?>
</body>
</html>
