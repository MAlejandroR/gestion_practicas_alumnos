<html>
    <head>
        <style type="text/css">
            body{
                background-color:#FFA07A;
            }
        </style>
    </head>
    <body>
        <?php
        echo"He acertado!!!! en " . ($_GET["jugadas"]-1) . " jugadas<br/>O<br/> no has sido sincero!!! ";
        ?>
        <form action="index.php" method="post">
            <input type="submit" name="mandar" value="Volver">
        </form>
    </body>
</html>