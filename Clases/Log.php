<?php
namespace Utilidades;

class Log{
    private static $name;

    /**
     * @param string $name
     * abre el fichero, establece el nombre del mismo
     * anota la hora en la cual vamos a hacer anotaciones
     */
    public static function init_file($name="log.txt"){
        self::$name=$name;
        echo "<h2>Creado fichero con nombre -". self::$name."- </h2>";
        $f=fopen(self::$name, "w");
        $fecha = date("d-m-Y H:i8:s", time());
        fwrite($f, $fecha.PHP_EOL);
        fclose($f);
     }




    /**
     * @param $texto
     * Escribe un texto en el fichero log.txt
     */
     public static function write($texto){
        if (!isset(self::$name))
            self::$name="log.txt";
         $f=fopen(self::$name, "a");
         echo "<h2>Escribiendo en -$f- </h2>";
         fwrite($f,$texto.PHP_EOL);
         fclose($f);
     }

     public static function borrar(){
         unlink("log.txt");

     }

}

?>
