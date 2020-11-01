<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Agenda contactos</title>
</head>


<body>
  <div>
    <header> AGENDA CONTACTOS. 0 contactos</header>
    <div class="listado_contactos">
      <div class="center">CONTACTOS</div>
      <hr>
      <div class="center">
        <table>
          <tr>
            <th>Nombre</th>
            <th>Telefono</th>
          </tr>
          <!-- Aqui ira la lista con los nombres-->

          <?php foreach ($agenda as $key => $value) {
                            echo "<tr><td>$key</td>";
                            echo "<td>$value</td></tr>";
                        }?>

        </table>
        <label><?php echo "$mensaje"?></label>
      </div>
    </div>
    
    <fieldset>
      <legend>Nuevo Contacto</legend>
      <form action='index.php' method="post">
        <br>
        <label for="nombre">Nombre</label><input type="text" name="nombre" size="15" /><br />
        <label for="telefono">Telefono </label><input type="text" name="telefono" size="15" /><br />
        <input type="submit" value="add" name="enviar">
        <input type="submit" value="remove" name="enviar" <?= "$eliminar"?>>

        <!-- Metemos los contactos existentes  ocultos en el formulario-->
        <?php 
                foreach ($agenda as $nombre => $tfn) {
                    echo "<input type=hidden name='agenda[$nombre]' value ='$tfn'>";
                }
                ?>

      </form>
    </fieldset>
  </div>
</body>

</html>