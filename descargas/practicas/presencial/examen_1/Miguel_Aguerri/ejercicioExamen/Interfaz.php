<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Interfaz
 *
 * @author alumno
 */
class Interfaz {
    //put your code here
    static function generarFormulario($colores){
        $msj=<<<FIN
                <fieldset>
            <legend>Establece la operación</legend>
            <form action="." method="POST">
                <select name="color1">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value='$color'>$color</option>";
                    }
                    ?>
                </select>
                <select name="color2">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value='$color'>$color</option>";
                    }
                    ?>
                </select>
               <select name="color3">
                    <?php
                    foreach ($colores as $color){
                        echo "<option value='$color'>$color</option>";
                    }
                    ?>
                </select>
                <select name="color4">
                    <?php
                    foreach ($colores as $color){
                        echo '<option value='$color'>$color</option>';
                    }
                    ?>
                </select>
                
            </form>
        </fieldset>
FIN;
        return $msj;
    }
}
