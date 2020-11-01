<?php

require_once "vendor/autoload.php";

Use Utilidades;


function mostrar_errores()
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$p = $_POST['practica'] ?? "p1";
$g = $_POST['grupo'] ?? "g1";

mostrar_errores();
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case "Enviar":


            $fichero = $_FILES['fichero'];
            echo "Practica $p<br />";
            echo "Grupo $g<br />";
            var_dump($fichero);
            $practica = new Utilidades\Practica($fichero, $g, $p);
            break;
        case "Descargar":
            //Comprimo toda la carpeta descargas en un zip
            $g = $_POST['grupo'];
            $p = $_POST['practica'];
            $filePath = "descargas/gestion_practicas_alumnos/$g";
            $outfile = dirname(dirname(__FILE__))."/$g$p.zip";

            Utilidades\Compresion::zipDir($filePath,$outfile);
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


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <legend>Datos de la práctica</legend>
        Fichero con la práctica
        <input type="file" name="fichero" id="">
        <br/>
        Grupo
        <input type="text" name="grupo" value="<?= $g ?>">
        Práctica
        <input type="text" name="practica" value="<?= $p ?>">
        <input type="submit" value="Enviar" name="submit">
        <input type="submit" value="Descargar" name="submit">
    </form>
</fieldset>

</body>
</html>