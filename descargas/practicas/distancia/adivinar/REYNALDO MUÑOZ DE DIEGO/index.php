<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Empezar</title>

<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cabecera">
  <h1>Práctica DWES - Adivina el número</h1>

</div>

<div id="principal">
<form action="jugar.php" method="post" name="adivinaInicial">
<fieldset>
  
  <legend>Juego adivina el número</legend>
  <h1>Selecciona un intervalo</h1>
  <p>
    <label>
      <input name="Opciones" type="radio" id="Opciones_1" value="1024" checked="CHECKED">
      1-1024 (10 intentos)</label>
     <br>
    <label>
      <input  type="radio" name="Opciones" id="Opciones_2" value="65536" >
      1-65536 (16 intentos)</label>
    <br>
    <label>
      <input type="radio" name="Opciones" id="Opciones_3" value="1048576">
      1-1048576 (20 intentos)</label>
  </p>
  <p>
    <input type="submit" name="empezar" id="submit" value="Empezar">
   
   </p>
    
</fieldset>
</form>
<h2>Instrucciones</h2>
<ul>
  <li>Piensa un número comprendido en el intervalo seleccionado.</li>
  <li>La aplicación lo acertará en el número de intentos establecido en cada intervalo.</li>
  <li>Cada vez que la aplicación te especifique un número deberás indicar:
    <ul>
      <li>Si el número buscado es mayor</li>
      <li>Si el valor buscado es menor</li>
      <li>Si se ha acertado el número  <br>
        </l
      ></ul>
  </li>
  </ul>

</div>

</body>
</html>