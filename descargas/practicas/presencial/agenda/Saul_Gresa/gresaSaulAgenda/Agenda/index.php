
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            table, th, td{
                border: 1px solid black;
                text-align: center;
            }
            th, td{
                width: 300px;
            }
        </style>
    </head>
    <body>
        <?php
        $msj;
        $nom = filter_input(INPUT_POST, 'nom');
        $tel = filter_input(INPUT_POST, 'tel');
        $agenda = $_POST['agenda'];
        if (isset($_POST['submit'])) {
            if ($nom == "" || $nom == "" && $tel == "") {
                echo "<script type='text/javascript'>alert('El nombre y/o el telefono esta vacio')</script>";       
            } else if($nom != "" && $tel == ""){
                if(key_exists($nom, $agenda)){
                    unset($agenda[$nom]);
                }
            }else {
                $agenda[$nom] = $tel;
            }
            foreach ($agenda as $n => $t){
                    $msj .= "<tr><td>$n</td><td>$t</td></tr>";
            }
        }
        if (isset($_POST['borrar'])){
            unset($agenda);
        }
        ?>
        <table id="t">
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
            </tr>
            <?= $msj ?>
        </table>
        <form action="" method="post">
            Nombre <input type="text" name="nom">
            Telefono <input type="number" name="tel">
            <input type="submit" name="submit" value="enviar">
            <input type="submit" name="borrar" value="borrar contactos">
            <?php 
            foreach ($agenda as $nombre=> $t) {
                echo "<input type=hidden name='agenda[$nombre]' value=$t />";
            }       
            ?>
        </form>
    </body>
</html>
