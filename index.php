<?php

require_once "vendor/autoload.php";

Use Utilidades\Log as Log;
Use Utilidades;

function mostrar_errores()
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
Log::init_file();
mostrar_errores();

$p = $_POST['practica'] ?? "p1";
$g = $_POST['grupo'] ?? "g1";

$zip = $_POST['zip'] ?? "$g$p.zip";

//mostrar_errores();
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case "Subir fichero y descomprimir":
            echo "<h2>Subiendo fichero</h2>";
            Log::write("Opción subir y descomprimir ficheros");
            $fichero = $_FILES['fichero'];
            Log::write("Fichero".$fichero['name']);
            $practica = new Utilidades\Practica($fichero, $g, $p);
     //       echo $practica;
            break;
        case "Descargar":
            //Comprimo toda la carpeta descargas en un zip
            $g = $_POST['grupo'];
            $p = $_POST['practica'];
            $filePath = "descargas/gestion_practicas_alumnos/$g";
            $outfile = dirname(__FILE__) . "/$g$p.zip";
          //  var_dump($outfile);


            Utilidades\Compresion::zipDir($filePath, $outfile);
//            var_dump("$g");
//            var_dump("$p");

//            if (!empty($file_zip) && file_exists($filePath)) {
            //Define headers
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$g$p.zip");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
//                 //Read the file
            readfile("$g$p.zip");
            exit;
        //   } else {
        //       echo 'The file does not exist.';
        //}


    }
}
$enable = "disabled";
if (file_exists("./descargas/gestion_practicas_alumnos/$g/$p"))
    $enable = scandir("./descargas/gestion_practicas_alumnos/$g/$p") > 2 ? null :"disabled" ;


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>

<fieldset class="contenedor">
    <h2>Descarga fichero zip con prácticas de alumnos</h2>
    <br>
    <fieldset class="inner">
        <legend>Formulario para datos de la práctica</legend>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="fichero">Fichero con la práctica</label>
            <input type="file" name="fichero" id="">
            <br/>
            <label for="grupo">Grupo</label>
            <input type="text" name="grupo" value="<?= $g="distancia" ?>">
            <br/>
            <label for="grupo">Pŕactica</label>
            <input type="text" name="practica" value="<?= $p="agenda" ?>">
            <br/>
            <input type="submit" value="Subir fichero y descomprimir" name="submit">
        </form>
    </fieldset>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <fieldset class="inner">
            <legend>Descargar el fichero zip con las prácticas</legend>
            <label for="grupo">Nombre del fichero a descargar el local</label>
            <input type="text" name="zip" value="<?= $zip ?>">
            <input type="submit" value="Descargar" name="submit" <?= $enable ?> />
        </fieldset>
    </form>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <fieldset class="inner">
            <legend>Mover prácticas a correción en vesta</legend>
            <label for="grupo">Nombre del fichero a descargar el local</label>
            <input type="text" name="zip" value="<?= $zip ?>">
            <input type="submit" value="Mover Vesta" name="submit" <?= $enable ?> />
        </fieldset>
    </form>
</fieldset>
</body>
</html>
