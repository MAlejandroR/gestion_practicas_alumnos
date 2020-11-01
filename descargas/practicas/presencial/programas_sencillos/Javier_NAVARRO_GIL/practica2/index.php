<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nombre="Javier";
        $apellido="Navarro";
        echo 'Mi nombre es "'.$nombre.'" y mi apellido es "'.$apellido.'"<br />';
        print 'Mi nombre es "'.$nombre.'" y mi apellido es "'.$apellido.'"<br />';
        echo 'Tanto echo como print permiten mostrar cadenas de texto.<br />'
        . 'Pero existen diferencias entre ellos: echo permite mostrar mas de una cadena'
        . ' separandolas por coma. Mientras que print no puede. <br />'
        . 'Pero print a la vez que muestra la cadena, '
        . 'devuelve un valr del tipo int y siempre es 1, por lo que se puede recoger en una variable.<br />';
 
        $informe=<<<FIN
            <pre>
            Este es un informe que tiene cinco lineas
            esta es la primera
            a continuación va la segunda
            la tercera ya en el medio
            la cuarta es la penultima
            y la última es la quinta
            </ pre>
FIN;
        echo 'El contenido de "informe" es'.$informe.'<br />';
        
        $v=25;
        echo'$v=25, valor de la variable $v -'.$v.'-<br />';
        echo"Tipo de la variable es ".gettype($v).'<br />';
        $v=true;
        echo'$v=true, valor de la variable $v -'.$v.'-<br />';
        echo"Tipo de la variable es ".gettype($v).'<br />';
        $v=7.25;
        echo'$v=7.25, valor de la variable $v -'.$v.'-<br />';
        echo"Tipo de la variable es ".gettype($v).'<br />';
        $v="Hola Caracola";
        echo'$v="Hola Caracola", valor de la variable $v -'.$v.'-<br />';
        echo"Tipo de la variable es ".gettype($v).'<br />';
        $v=null;
        echo'$v=null, valor de la variable $v -'.$v.'-<br />';
        echo"Tipo de la variable es ".gettype($v).'<br />';
        
        echo"Codigo ascii del valor 64 al 122"."<br />".
            "64 =". chr(64)."   65 =". chr(65)."    66 =". chr(66)."    67 =". chr(67)."    68 =". chr(68)."    69 =". chr(69)."    70 =". chr(70)."<br />".
            "71 =". chr(71)."   72 =". chr(72)."    73 =". chr(73)."    74 =". chr(74)."    75 =". chr(75)."    76 =". chr(76)."    77 =". chr(77)."<br />".            
            "78 =". chr(78)."   79 =". chr(79)."    80 =". chr(80)."    81 =". chr(81)."    82 =". chr(82)."    83 =". chr(83)."    84 =". chr(84)."<br />".
            "85 =". chr(85)."   86 =". chr(86)."    87 =". chr(78)."    88 =". chr(88)."    89 =". chr(89)."    90 =". chr(90)."    91 =". chr(91)."<br />".
            "92 =". chr(92)."   93 =". chr(93)."    94 =". chr(94)."    95 =". chr(95)."    96 =". chr(96)."    97 =". chr(97)."    98 =". chr(98)."<br />".            
            "99 =". chr(99)."   100 =". chr(100)."  101 =". chr(101)."  102 =". chr(102)."  103 =". chr(103)."  104 =". chr(104)."  105 =". chr(105)."<br />".
            "106 =". chr(106)." 107 =". chr(107)."  108 =". chr(108)."  109 =". chr(109)."  110 =". chr(110)."  111 =". chr(111)."  112 =". chr(112)."<br />".
            "113 =". chr(113)." 114 =". chr(114)."  115 =". chr(115)."  116 =". chr(116)."  117 =". chr(117)."  118 =". chr(118)."  119 =". chr(119)."<br />".
            "120 =". chr(120)."  121 =". chr(121)."  122 =". chr(122)."<br />";
        
        


            echo "La fecha actual es ".date('d-m-Y')."<br />";
            echo "Dias desde el 1/1/1970 ".round(time()/(24*60*60))."dias <br />";
            echo "Hora desde el 1/1/1970 ".round(time()/(60*60))."horas <br />";
            echo "minutos desde el 1/1/1970 ".round(time()/(60))."minutos<br />";
            echo "Fecha con formato personalizado ".date(l).", dia ".date(d)." de ".date(F)." de ".date(Y)."<br />";
            echo "Fecha ".date('27-12-69')."<br />";
            $nacimiento=new DateTime('1969-12-27');
            $hoy=new DateTime('now');
            $diferancia= date_diff($nacimiento, $hoy);
            $anios=$diferancia->y;
            $meses=$diferancia->m;
            $dias=$diferancia->d;
            
            echo "Fecha de naciemiento $nacimiento hecha actual $hoy tienes una edad de ".$anios." años<br>";
            echo "Fecha de naciemiento $nacimiento hecha actual $hoy tienes una edad de ".$meses." meses<br>";
            echo "Fecha de naciemiento $nacimiento hecha actual $hoy tienes una edad de ".$dias." dias<br>";
            
            $nacimiento=new DateTime('1969-10-30');
            $hoy=new DateTime('now');
            $diferancia= date_diff($nacimiento, $hoy);
            $anios=$diferancia->y;
            $meses=$diferancia->m;
            $dias=$diferancia->d;
            
            echo "Fecha de naciemiento $nacimiento hecha actual $hoy tienes una edad de ".$anios." años<br>";
            echo "Fecha de naciemiento $nacimiento hecha actual $hoy tienes una edad de ".$meses." meses<br>";
            echo "Fecha de naciemiento $nacimiento hecha actual $hoy tienes una edad de ".$dias." dias<br>";

            echo "<hr>";
            echo strtotime("now"), "<br/>";
            echo date('d-m-Y', strtotime("now")), "<br/>";
            echo strtotime("27 September 1970"), "<br/>";
            echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
            echo strtotime("+1 day"), "<br/>";
            echo date('d-m-Y',strtotime("+1 day")), "<br/>";
            echo strtotime("+1 week"), "<br/>";
            echo date('d-m-Y',strtotime("+1 week")), "<br/>";
            echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
            echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
            echo strtotime("next Thursday"), "<br/>";
            echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
            echo strtotime("last Monday"), "<br/>";
            echo date('d-m-Y',strtotime("last Monday")), "<br/>";
            echo "<hr>"
        ?>
    </body>
</html>