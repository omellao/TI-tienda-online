<?php
require_once "Conexion.php";

if ($_POST['pass'] != null && 
    $_POST['name'] != null) {

    $db = new Crud();
    $data = $db->mostrarDatos();

    foreach ($data as $i) {
        if ($i->pass == $_POST['pass']) {
            echo "";
            return;
        } else if ($i->name == $_POST['name']) {
            echo "";
            return;
        }
    }

    $result = $db->insertData($newUser);

} else {
    echo "las contraseñas no coinciden\n";
}

?>
