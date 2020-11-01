<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Valores Asignados</th>
                    <th>Mostrando Valores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$a=5</td>
                    <td><?php
                        $a = 5;
                        printf("--%d--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a = "Cadena"</td>
                    <td><?php
                        $a = "Cadena";
                        printf("--%s--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a=0xAFF475</td>
                    <td><?php
                        $a = 0xAFF475;
                        printf("--%X--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a = 0b101</td>
                    <td><?php
                        $a = 0b101;
                        printf("--%b--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a = 5+9 </td>
                    <td><?php
                        $a = 5 + 9;
                        printf("--%d--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a = "Hi"." there"</td>
                    <td><?php
                        $a = "Hi" . " there";
                        $a = printf("--%s--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a = printf("--%s--", $a)</td>
                    <td><?php
                        printf("--%s--", $a)
                        ?></td>
                </tr>
                <tr>
                    <td>$a = ($v=8)</td>
                    <td><?php
                        $a = ($v = 8);
                        printf("--%s--</b>", $a)
                        ?></td>
                </tr>
            </tbody>
        </table>


        <?php header("refresh:5; url=index.php") ?>

    </body>
</html>
