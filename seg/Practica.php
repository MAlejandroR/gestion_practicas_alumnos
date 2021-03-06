<?php

/*REQUISITOS
RF1 cojo el fichero zip que contiene la práctica (siempre zip)
Lo descomprimo en mi servidor en un directorio llamado


*/

class Practica
{

    private $fichero; //fichero zip con la práctica de todos los alumnos
    private $grupo; //Grupo
    private $practica; //número de práctica
    private $msj; //Mantiene información de la acción de la clase
    //Posible guardar en fichero
    private $dir; //directorio donde crearemos los directorios de los alumnos con su práctica

    /**
     * Practica constructor.
     * @param array $f fichero zip con la práctica de los alumnos
     * @param string $g grupo de alumnos
     * @param string $p nombre de la práctica (nombre corto)
     */
    public function __construct(array $f, string $g, string $p)
    {
        //Asignamos valores a los atributos (grupo, práctica y fichero zip con la práctica)
        $this->fichero = $f;
        $this->grupo = $g;
        $this->practica = $p;
        $this->dir = "./descargas/gestion_practicas_alumnos/$this->grupo/$this->practica/";
        $datos_fichero = print_r($f, true);

        $msj = "Grupo $g\n - Práctica $p\n - Fichero zip con las prácticas $datos_fichero<br />\n dir $this->dir<br />\n";

        //Creamos el directorio para guardar las prácticas .descargas/gestion_practicas_alumnos/$grupo/$gestion_practicas_alumnos
        $msj .= $this->crea_directorios();

        //Copia el fichero zip con la práctica al directorio creado
        $msj .= $this->copia_practica();


        //Descomprimir el fichero zip con los diferentes ficheros
        //uno por cada alumno
        $msj .= $this->descomprime_zip($this->dir, "$this->dir$this->practica.zip");


        $msj .= $this->dir_practica_alumno();
        //$this->msj .= "<H2>Fin En construct</h2>";
        $this->msj = $msj;

    }

    /**
     * @return string información de si ha creado o no el directorio o si ya existía.
     *          Este string lo almacenamos en el atributo $msj.
     * @source Intenta crear el directorio donde almacenaremos la práctica
     *       Será en ./descargas/gestion_practicas_alumnos/grupo/practica
     */
    private function crea_directorios()
    {
        $msj = "En método  crea_directorios<br />\n";

        if (file_exists($this->dir))
            $msj .= "El directorio $this->dir ya existe <br />\n";
        else {
            $action = mkdir($this->dir, 0777, true);
            $msj .= "El directorio <strong>$this->dir </strong>\n<br />";
            $msj .= $action ? " se ha creado <strong>Correctamente</strong>" : "<strong> ERROR!! No se ha podido crear</strong>";
            $msj .= "<hr />\n";
        }
        return $msj;


    }

    /**
     * @source Copia el zip con toda la práctica al directorio establecido
     *         Mantiene el nombre del fichero descargado
     * @return string msj que informa si lo ha copiado o no correctamente
     */
    private function copia_practica()
    {
        $msj = "En método copia_practica <br />\n";
        $file = $this->fichero;
        $source = $file['tmp_name'];
        $destino = "$this->dir$this->practica.zip";
        if (move_uploaded_file($source, $destino))
            $msj .= "Se ha copiado correctamente $destino <br />";
        else
            $msj .= "Error copiando $destino <br />";
        $msj .= "<hr />\n";
        return $msj;
    }

    /**
     * @source Descomprime la práctica en el directorio de esa práctica
     * @param $dir string  El directorio dónde descomprimir
     * @param $fichero string  El fichero a  descomprimir
     *
     * @return string msj de cómo han ido las cosas
     */
    private function descomprime_zip($dir, $fichero)
    {
        $msj = "En método descomprime_zip <br />\n";
        $msj .= "Argumento 1: dir = $dir<br />\n";
        $msj .= "Argumento 2: fichero = $fichero<br />\n";
        $zip = new ZipArchive();
        $zip->open("$fichero");
        if ($zip->extractTo("$dir")) {
            unlink($fichero);//Elininamos el fichero que hemos descomprimido
            $msj .= "Se ha descomprimido correctamente $fichero<br />\n";
            $msj .= "Se ha eliminado el fichero $fichero<br />\n";
        }
        else
            $msj .= "Error  descomprimiendo $fichero";
        $msj .= "<hr />\n";
        return $msj;


    }
    private function descomprime_tar($dir, $fichero)
    {

        $msj ="Estoy en descomprime_tar con fichero <strong>$fichero</strong><br />\n";


        $p = new PharData($fichero);
        $p->decompressFiles();
        

        return $msj;


    }

    public function __toString()
    {
        return (string)$this->msj;
    }

    /**
     * @source
     * Se lee todo los ficheros de un directorio
     * para cada uno  (son nombres de fichero de práctica de cada alumno)
     * se crea un directorio con el nombre y apellido
     * Se copia el fichero con ese nombre
     * Se descomprime el fichero
     *
     */
    private function dir_practica_alumno()
    {
        //Obtenemos todos los ficheros del directorio.
      $msj = "En método dir_practica_alumno <br />\n";

        $practicas = dir($this->dir);


        while (false !== ($file = $practicas->read())) {
            if ($file != '.' && $file != '..') {
                $nombre = $this->get_name($file);
                $extension = $this->get_extension($file);
                $msj.= "Fichero <strong>$file<strong><br />\n";
                $msj.="Leído fichero <strong> $nombre</strong><br />\n";
                $msj.= "Extensión <strong>$extension<strong><br />\n";
                $m = mkdir("$this->dir/$nombre",0777, true);
                $r = rename("$this->dir/$file", "$this->dir/$nombre/$nombre.$extension");
                $msj.= "Mkdir retorno -$m-<br />\n";
                $msj.= "rename retorno -$r-<br />\n";
                $msj.= "Voy a descomprimir <strrong>$this->dir$nombre/$nombre.$extension</strong><br />\n";
                $msj.= $this->descomprime("$this->dir$nombre/$nombre.$extension");

            }
        }
        return $msj;
    }

    private function get_name($file)
    {
        $name = substr($file, 0, strpos($file, "_"));
        $name = str_replace(" ", "_", $name);
        return $name;
    }

    private function get_extension($file)

    {
        //Si fichero viene con ruta habrá que quitarla
        $pos = strripos($file, "/");
        if ($pos ===FALSE)
        $extension = substr($file, strpos($file, ".")+1);
        else
            $file = substr($file, $pos);
            $extension = substr($file, strpos($file, ".")+1);
        return $extension;
    }

    private function descomprime($fichero)
    {
        $msj= "<hr />";
        $msj.= "Estoy en método descomprimer con fichero <strong>$fichero</strong><br />\n";

        $extension = $this->get_extension($fichero);

        $msj.= "Tengo la extensión <strong>$extension</strong><br />\n";
        switch ($extension) {
            case 'zip':
                $msj .= "En caso zip <br />\n";
                $dir = substr($fichero, 0,strripos($fichero,'/'));
                $msj .="con directorio $dir<br />\n";
                $msj .= $this->descomprime_zip($dir,$fichero);
                break;
            case 'tar':

                $msj .= "En caso tar <br />\n";
                $dir = substr($fichero, 0, strripos($fichero, "/"));
                $msj .= "Voy a ejecutar tar x $fichero  $dir<br />";

                $msj .= "shell devuelve -".shell_exec("tar x $fichero $dir") ."-<br />";
            case'tar.xz':
                $msj .= "En caso rarito tar.xz <br />\n";
                $msj .= shell_exec("tar Jxvz $fichero");
                break;
            case 'rar':
                $msj .= "En caso rar <br />\n";
                $dir = substr($fichero, 0, strripos($fichero, "/"));
                $msj .= "Voy a ejecutar unrar xy $fichero  $dir<br />";

                $msj .= "shell devuelve -".shell_exec("unrar x $fichero $dir") ."-<br />";
                break;

        }
        //}
        return $msj;
    }

    private function descomprimer_tar($fichero)
    {
        $p = new PharData("$fichero");
        $msj = $p->decompress();
        return $msj;
    }


}

/*
var_dump($_POST);
var_dump($_FILES);
if ($_POST['enviar'])
{
$ficheros = $_FILES['ficheros'];
$grupo = $_POST['grupo'];
$practica = $_POST['practica'];
var_dump($ficheros);
var_dump($grupo);
var_dump($practica);

    //Creo el directorio del grupo/practica en el proyecto actual
$dir = "descargas/$grupo";
if (!(file_exists("descargas")))
mkdir("descargas");
if (!(file_exists("descargas/$grupo")))
mkdir("descargas/$grupo");
if (!(file_exists("descargas/$grupo/$practica")))
mkdir("descargas/$grupo/$practica");
}

//Copio los ficheros descargados copiando solo el nombre
$pos = 0;
foreach ($ficheros['name'] as $name) {


    $new_name = substr($name, 0, strpos($name, "_"));
    $new_name = str_replace(" ", "_", $new_name);
    $extension = substr($name, strpos($name, "."));
    $new_name = $new_name . $extension;

    $a = move_uploaded_file($ficheros['tmp_name'][$pos++], "descargas/$grupo/$practica/$new_name");
    echo "<h1>$a</h1>";
}

$ficheros = scandir("descargas/$grupo/$practica/");
foreach ($ficheros as $fichero) {
    if ($fichero == '.' || $fichero == '..')
        continue;
    $extension = substr($name, strpos($name, ".") + 1);
    switch ($extension) {
        case "zip":
            $zip = new ZipArchive();
            $zip->extractTo(".");
            break;
        case "tar":
        case "tar.xz":
            $p = new PharData("descargas/$grupo/$practica/$fichero");
            $p->decompress();
            break;
        case "rar":
            break;

    }


}
/*
$zip = new ZipArchive();
$filename = "/var/www/dwes/p1/./test112.zip";

if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
    exit("cannot open <$filename>\n");
}

$zip->addFromString("testfilephp.txt" . time(), "#1 Esto es una cadena de prueba añadida como  testfilephp.txt.\n");
$zip->addFromString("testfilephp2.txt" . time(), "#2 Esto es una cadena de prueba añadida como testfilephp2.txt.\n");
$zip->addFile($thisdir . "/too.php", "/testfromfile.php");
echo "numficheros: " . $zip->numFiles . "\n";
echo "estado:" . $zip->status . "\n";
$zip->close();
*/
?>
