<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Jugar</title>


<link href="css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="cabecera">
  <h1>Práctica DWES - Adivina el número</h1>
  
      <?php
	  
	  	//Iniciamos el juego con los valores obtenidos de la opción elegida por el usuario
      if(){

      }elseif(){

      }elseif(){

      }else{

      }

	 							
		if (isset($_POST['empezar'])) {

			$jugada = 0; // Iniciamos la jugada con 0 y se cuenta como primera la primera acción del jugador (mayor - menor - igual > jugar)
			$min = 0;
			$max = $_POST["Opciones"]; // tomamos como valor máximo la opción marcada por el jugador y enviada en el formulario
			$numeroMedio = ($max+$min)/2;
			$mensajeNumero = ("¿El numero es el " . $numeroMedio . "?<br>");

			// Establecemos el número de intentos tomando como referencia el valor marcado por el jugador
			if ($max ==1024) {
				$intentos = 10;
			} else if ($max==65536) {
				$intentos = 16;
			} else if ($max==1048576) {
				$intentos = 20;
			}
			
			//Almacenamos los valores iniciales (campos ocultos) para ser recuperados en la copción "reiniciar"
			$maximoInicial = $max;
			$medioInicial = $numeroMedio;
			$intentosInicial= $intentos;
		} 

		if (isset ($_POST ["reiniciar"])) {
			
			$jugada = 0;
			$min = 0;
			$max = $_POST["maximoInicial"];
			$numeroMedio = $_POST["medioInicial"];
			$intentos = $_POST["intentosInicial"];
			$mensajeNumero = ("¿El numero es el " . $numeroMedio . "?<br>");
			 
			 //Mantenemos los valores iniciales al reiniciar el juego
			$maximoInicial = $_POST["maximoInicial"];
			$medioInicial = $_POST["medioInicial"];
			$intentosInicial = $_POST["intentosInicial"];
			 
		}
			
		if (isset ($_POST ["jugar"])) {
	
			$max = $_POST["max"];
			$min = $_POST["min"];
			$numeroMedio = $_POST["medio"];
			$intentos = $_POST ["intentos"];
			$jugada = $_POST ["jugada"];
			$opcion = $_POST["opcion"];
			
			$mensajeNumero = ("¿El numero es el " . $numeroMedio . "?<br>");
			
			//Mantenemos los valores iniciales mientras ejecutamos el juego
			$maximoInicial = $_POST["maximoInicial"];
			$medioInicial = $_POST["medioInicial"];
			$intentosInicial = $_POST["intentosInicial"];
			
			calcular();
			
		}

		function calcular () {
			
			//Declaramos las variables como globales dentro de la función
			//para la actualización de los datos a medida que se ejecutan intentos
			global $max;
			global $min;
			global $numeroMedio;
			global $intentos;
			global $jugada;
			global $opcion;
			global $mensajeNumero;
			
			//Opción "Mayor" y número de intentos dentro del límite
			if ($opcion=="mayor" && $jugada<$intentos) {
				$min = $numeroMedio;
				$max = $max;
				$numeroMedio= ($min + $max)/2;
				
				//Evitamos el engaño: número acertado y no pulsar "Igual"
				//Cuando en el cálculo obtenemos un float es que hemos acertado
				//El número es el obtenido redondeado a la baja. Llevamos al jugador a la página enganno.php
				if (is_float($numeroMedio)) {
					$numeroMedio = floor ($numeroMedio);
					header ("Location: enganno.php?numeroMedio=$numeroMedio&jugada=$jugada&intentos=$intentos");
				} else {
					$mensajeNumero = ("¿El numero es el " . $numeroMedio . "?<br>");
					$jugada+= 1;
				}
			}
			
			//Opción "Menor" y número de intentos dentro del límite
			else if ($opcion=="menor" && $jugada<$intentos) {
				$max = $numeroMedio;
				$min = $min;
				$numeroMedio= ($min + $max)/2;
				
				//Evitamos el engaño: número acertado y no pulsar "Igual"
				//Cuando en el cálculo obtenemos un float es que hemos acertado
				//El número es el obtenido redondeado al alza. Llevamos al jugador a la página enganno.php
				if (is_float($numeroMedio)) {
					$numeroMedio = ceil ($numeroMedio);
					header ("Location: enganno.php?numeroMedio=$numeroMedio&jugada=$jugada&intentos=$intentos");
				} else {
					$mensajeNumero = ("¿El numero es el " . $numeroMedio . "?<br>");
					$jugada+= 1;
				}
			} 
			
			//Opción "Igual" o número de intentos superando el límite
			//Enviamos el valor de la variable $jugada e $intentos a página fin.php para su gestión
			else if ($opcion=="igual" || $jugada == $intentos) {
				header ("Location: fin.php?jugada=$jugada&intentos=$intentos");
			} 
		}
?>

</div>

<div id="principal">

<fieldset>

	<legend>Empieza el juego</legend>
          <h1><?php echo ($mensajeNumero)?></h1>
          <p><strong>Jugada <?php echo ($jugada)?> </strong>  </p>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          
          <fieldset>
              <legend>Indica cómo es el número que has pensado</legend>
                <label>
                  <input name="opcion" type="radio" id="mayor" value="mayor" checked="CHECKED">
                  Mayor</label>
                <br>
                <label>
                  <input type="radio" name="opcion" value="menor" id="menor">
                  Menor</label>
                <br>
                <label>
                  <input type="radio" name="opcion" value="igual" id="igual">
                  Igual</label>
              </p>
                
           </fieldset>
           <p>
            <input type="submit" name="jugar" id="jugar" value="Jugar">
            <input type="submit" name="reiniciar"  id="reiniciar" value="Reiniciar">
            <button type="button" onclick="location.href='index.php'">Volver</button>
            
            <!--CAMPOS OCULTOS-->
            
            <!-- campos ocultos para manejar el valor de las variables -->
            <input type = "hidden" name="min" value="<?PHP echo $min?>">
            <input type = "hidden" name="max" value="<?PHP echo $max?>">
            <input type = "hidden" name="jugada" value="<?PHP echo $jugada?>">
            <input type = "hidden" name="intentos" value="<?PHP echo $intentos?>">
            <input type = "hidden" name="medio" value="<?PHP echo $numeroMedio?>">
            
            <!-- campos ocultos para conservar los valores iniciales -->
            <!-- estos datos serán la referencia al "Reiniciar" el juego" -->
            <input type = "hidden" name="maximoInicial" value="<?PHP echo $maximoInicial?>">
            <input type = "hidden" name="medioInicial" value="<?PHP echo $medioInicial?>">
            <input type = "hidden" name="intentosInicial" value="<?PHP echo $intentosInicial?>">
            
        
    	</form>
</fieldset>
</div>
</body>
</html>
