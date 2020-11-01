<?php 
spl_autoload_register(function($clase){
    include $clase . '.php';
});

$op = filter_input(INPUT_POST, 'operacion');
$operacion;
$resultado;

if((Operacion::valida($op)) == Operacion::REAL){
    $msj = "$op es una operacion entera";
    for($i=0;$i< strlen($op);$i++){
        if($op[$i]=="+" || $op[$i]=="-" || $op[$i]=="*" || $op[$i]=="/"){
            $signo = $op[$i];
            $operacion = new OperacionReal($op);
            $operacion->setOperacion($signo);
            $op1 = substr($op, 0, $i-1);
            $operacion->setOp1($op1);
            $op2 = substr($op, $i+1);
            $operacion->setOp2($op2);
            echo "Funciono";
        }
    }
    switch ($operacion->getOperacion()){
        case "+":
            $resultado = $operacion->sumar($operacion->getOp1(), $operacion->getOp2());
            $msj2 = "El resultado de la operacion es $resultado";
        break;
        case "-":
            $resultado = $operacion->restar($operacion->getOp1(), $operacion->getOp2());
            $msj2 = "El resultado de la operacion es $resultado";
        break;
        case "*":
            $resultado = $operacion->multi($operacion->getOp1(), $operacion->getOp2());
            $msj2 = "El resultado de la operacion es $resultado";
        break;
        case "/":
            $resultado = $operacion->div($operacion->getOp1(), $operacion->getOp2());
            $msj2 = "El resultado de la operacion es $resultado";
        break;
    }
}
elseif ((Operacion::valida($op)) == Operacion::RACIONAL){
    $msj = "$op es una operacion racional";
}else{
    $msj = "$op NO es entero NI racional";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <input type="text" name="operacion">
            <input type="submit" name="submit" value="submit">
        </form>
        <?= $msj ?>
        <?= $msj2 ?> 
        <fieldset>
            <legend>Resultado</legend>
            <label>
               <?php  if (Operacion::valida($op) == Operacion::REAL ){ ?>
                <table border=1>
                    <tr>
                        <th>Concepto</th> 
                        <th>Valores</th>
                    </tr>
                    <tr>
                        <th>Operando 1</th> 
                        <th><?php $operacion->getOp1() ?></th>
                    </tr>
                    <tr>
                        <th>Operando 2</th> 
                        <th><?php $operacion->getOp2() ?></th>
                    </tr>
                    <tr>
                        <th>Operación</th> 
                        <th><?php $operacion->getOperacion() ?></th>
                    </tr>
                    <tr>
                        <th>Tipo de operacion</th>
                        <th>Real</th>
                    </tr>
                    <tr>
                        <th>Resultado</th>
                        <th><?php $resultado ?></th>
                    </tr>
                </table>
               <?php } ?>
            </label>
        </fieldset>
    </body>
</html>
