<!DOCTYPE html>

<html>
    <head>
        <title>Calculadora</title>
        <style type="text/css">
                h1{
                color: orange;
                
            }
            fieldset{
               width: 50%;
                margin: 40px;
                background-color:#FFFF33;
            }
        
            .cuenta{
                height: 50px;
                width: 300px;

            }
            .submit{
                background-color: orangered;
                width: 70px;
                height: 40px;
            }
            

        </style>
        <?php
        spl_autoload_register(function ($clase) {
            include $clase . '.php';
        });
        
        if (isset($_POST['cuenta'])) {
            $cadena = $_POST['cuenta'];
            $n=Operacion::Validar($cadena);
            if($n==3){
            $r= new OperacionReal($n,$cadena);    
            }else{
            $r= new Operacion_Racional($n,$cadena);
            
           
            
            }
            
             $tabla="<table class=tabla><tr><th>Concepto</th><th>Valores</th></tr>"
                    . "<tr><td>Operando 1</td><td>".$r->getOP1()."</td></tr>"
                     . "<tr><td>Operando2</td><td>".$r->getOP2() ."</td></tr>"
                     . "<tr><td>Operacion</td><td>". $r->getOperando()."</td></tr>"
                     . "<tr><td>Tipo de operacion</td><td>".$r->getClaseOp() ."</td></tr>"
                     . "<tr><td>Resultado</td><td>".$r->getResultado() ."</td></tr>";

        } else {
            $cadena = "error";
        }
        ?>

    </head>
    <fieldset>
        <h1>Establece la operación</h1>

        <form action="index.php" method="POST">
            <input class="cuenta" type="text" name="cuenta">
            <br> <br>
            <input class="submit" type="submit" value="Calcular">


        </form>
        <div>
            <?=  
               "<br><br>".$r."<br><br>" 
                
        ?>
        </div>
        <div class="izq">
            <?= 
                $tabla;
                ?>
        </div>
    </fieldset>
</body>
</html>


</body>
</html>
