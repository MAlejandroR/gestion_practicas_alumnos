<?php

namespace Utilidades;

use Utilidades;
use ZipArchive;

class Compresion
{
    /**
     * @var string $source es el nombre con ruta completo
     */
    private $source;
    /**
     * @var $file es el nombre del fichero a descomprimir
     */
    private $file;
    /**
     * @var string @dir directorio de la ubicación del fichero
     */
    private $dir;
    /**
     * @var string  type es el tipo de fichero (zip, tar, ...)
     */
    /**
     * @var string $dir_destination dir donde se quiere descomprimir
     *                              por defecto el mismo donde se ubica el fichero
     */
    private $dir_destination;

    public function __construct(string $file)
    {
        $separador = DIRECTORY_SEPARATOR;
        $nombres = explode($separador, $file);
        $num_dir = count($nombres) - 1;
        $this->file = $nombres[$num_dir];
        $this->dir = implode($separador, $nombres);
    }



    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "Objeto COMPRESION " . $this->msj . "<br/>";
    }

    private function descomprimir()
    {
        $extension = substr($this->file, strpos(".", $this->file));
        switch ($extension) {
            case 'zip':
                $zip = new ZipArchive();
                $file = $this->dir . DIRECTORY_SEPARATOR . $this->file;
                $zip->open("$file");
                if ($zip->extractTo("$this->dir"))
                    $this->msj = "Se ha descomprimido $file en $this->>dir";
                else
                    $this->msj = "ERROR descomprimiendo $file en $this->>dir";
                break;

            case 'tar':
                $opciones = "-xvf";
            case 'tar.xz':
            case 'xz':
                $opciones = is_null($opciones) ? "-xvfJ" : $opciones;
                $file = $this->dir . DIRECTORY_SEPARATOR . $this->file;
                $this->msj .= "shell devuelve -" . shell_exec("tar $opciones   $file -C $this->dir") . "-<br />";
                break;
            case 'rar':
                $file = $this->dir . DIRECTORY_SEPARATOR . $this->file;
                $this->msj .= "shell devuelve -" . shell_exec("unrar x $file $this->dir") . "-<br />";
                break;

        }


    }

    /**
     * @param $folder carpeta a incluir (sus ficheros)
     * @param $zipFile fichero dónde incluirlo ZipAchive
     * @param $exclusiveLength Longitud dónde empieza en nombre del fichero
     * @source funcion recursiva que add directorios y ficheros al zip
     * Cada vez que encuentra un fichero lo add al zip
     * Si encuentra una carpeta, crea en el zip la carpeta vación y llama a la función con el nuevo directorio
     *
     */
    private static function folderToZip($folder, $zipFile, $exclusiveLength) {
        $handle = opendir($folder);
        while (false !== $f = readdir($handle)) {
            if ($f != '.' && $f != '..') {
                $filePath = "$folder/$f";
                // Remove prefix from file path before add to zip.
                $localPath = substr($filePath, $exclusiveLength);
                if (is_file($filePath)) {
                    $zipFile->addFile($filePath, $localPath);
//                    echo "<h1>Añadiendo $filePath en $localPath</h1>";
                } elseif (is_dir($filePath)) {
                    // Add sub-directory.
                    $zipFile->addEmptyDir($localPath);
                    self::folderToZip($filePath, $zipFile, $exclusiveLength);
                }
            }
        }
        closedir($handle);
    }

    /**
     * Zip a folder (include itself).
     * Usage:
     *   HZip::zipDir('/path/to/sourceDir', '/path/to/out.zip');
     *
     * @param string $sourcePath Path of directory to be zip.
     * @param string $outZipPath Path of output zip file.
     */
    public static function zipDir($sourcePath, $outZipPath)
    {
//        var_dump($sourcePath);
//        var_dump($outZipPath);
        $pathInfo = pathInfo($sourcePath);
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];
//        var_dump($parentPath);
//        var_dump($pathInfo);
//        var_dump($dirName);
        $z = new ZipArchive();
        $z->open($outZipPath, ZIPARCHIVE::CREATE);
        $z->addEmptyDir($dirName);
//        echo "<h1>$z->filename</h1>";
        self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
        $z->close();
    }

}


?>