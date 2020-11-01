<?php
    $agenda= array();
    $firstLoad = true;
    $postValues = filter_input_array(INPUT_POST);
    $action;
    if(isset($_POST["firstLoad"])) {
        $firstLoad = false;
    } 

    if($postValues != null) {
        if(array_key_exists("agenda", $postValues)) {
            $agenda = $postValues["agenda"];
        }
        if(array_key_exists("action", $postValues)) {
            $action = $postValues["action"];
        }
    }

    $contactName = recoverInput("contactName");
    $contactNumber = recoverInput("contactNumber");

    if(!$firstLoad) {
        if($action == "addContact") {
            if(empty($contactName)) {
                echo "Error, el nombre del contacto no puede estar vacio";
            }
            else if(!$firstLoad && !empty($contactNumber) && !is_numeric($contactNumber)) {
                echo "El tel&eacute;fono debe ser n&uacute;merico y $contactNumber no lo es";
            }
            else {
                if(array_key_exists($contactName, $agenda)) {
                    if(!empty($contactNumber)) {
                        $agenda[$contactName]=$contactNumber;
                    }
                    else {
                        unset($agenda[$contactName]);
                    }
                }
                else {
                    if(empty($contactNumber)) {
                        echo "Debe facilitar un tel&eacute;fono para el contacto $contactName";
                    }
                    else {
                        $agenda[$contactName]=$contactNumber;
                    }
                }
            }
        }
        else if($action == "removeContacts") {
            $agenda = array();
        }
    }
?>
<h1>Mi agenda</h1>
<table>
    <thead>
        <th>
            Nombre
        </th>
        <th>
            Telefono
        </th>
    </thead>
    <tbody>
        <?php
        foreach($agenda as $contact=>$number) {
            echo "<tr><td>$contact</td><td>$number</td></tr>";
        }
        ?>
    </tbody>
</table>

<form action="index.php" method="POST">
    <input type="text" name="contactName"/>Nombre
    <input type="text" name="contactNumber"/>Numero
    <input type="hidden" name="firstLoad" value="<?php echo $firstLoad?>"/>
    <?php
    if(!empty($agenda)) {
        foreach($agenda as $contact=>$number) {
            echo "<input type='hidden' name=agenda[$contact] value=$number />";
        }
    }
    ?>
    <button type="submit" name="action" value="addContact">Añadir contacto</button>
    <button type="submit" name="action" value="removeContacts" 
        <?php if(empty($agenda)) { echo "disabled"; }?>>
        Eliminar contactos
    </button>
</form>    

<?php
    function recoverInput($inputName) {
        $result = "";

        if(isset($_POST[$inputName])) {
            $result = $_POST[$inputName];
        }

        return $result;
    }
?>