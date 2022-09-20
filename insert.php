<?php

require "/home/oscar/public_html/class/Crud.php";

$newUser = array(
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "passwd" => password_hash($_POST['passwd'], PASSWORD_DEFAULT)
);

if ($_POST['passwd1'] === $_POST['passwd'] && 
    $_POST['name'] != null && 
    $_POST['email'] != null) {

    $db = new Crud();
    $data = $db->readData();

    foreach ($data as $i) {
        if ($i->email == $_POST['email']) {
            echo "no puedes tener un mismo correo con dos cuentas<br>";
            return;
        } else if ($i->name == $_POST['name']) {
            echo "Ese nombre ya existe y esta ocupado <br>";
            return;
        }
    }

    $result = $db->insertData($newUser);
    echo "te has registrado con la id: {$result->getInsertedId()}<br>";

} else {
    echo "las contraseñas no coinciden\n";
}

?>
