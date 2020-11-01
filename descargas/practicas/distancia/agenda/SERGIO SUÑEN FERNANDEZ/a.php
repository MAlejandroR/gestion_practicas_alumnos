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
	<div class="topdiv"> 
		
		<h2 align="center" class="h1Text"> Actualmente hay 1 contactos <h2>

	</div>
		<tr> 
			
		<div>
			<td>
				<div class="leftdiv"> 
					<form action="index.php" method="POST"> 
						<h4>Nombre: </h4> <input type="text" name="contName" value = " "><br>
						<h4>Numero: </h4> <input type="number" name="contPhone" min="1" max="999999999">
						<br>
						<br>
						<input type="submit" name="contAdd" value="Añadir contacto">&nbsp;&nbsp;
						<input type="submit" name="contRemove" value="Borrar contatos"><input type ="hidden" name = "contListName" value = "Pedro">
						<input type ="hidden" name = "contListPhone" value = "8maria">
						<br><br>
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
					<tr> 
						<td>Pedro </td>
						<td>8maria </td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</div></body>
</html>