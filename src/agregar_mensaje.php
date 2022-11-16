<?php   
    require_once "class/Crud.php";

    session_start();

    $id = $_POST['id_chat'];
    $emisor = $_SESSION['username'];
    $mensaje = $_POST['message'];

    // FECHA 
    // $fechaa = date('m-d-Y h:i:s a', time());
    $fechaa = date("H:i");

    $datoNuevo = array(
        "id_chat" => $id,
        "emisor" => $emisor,
        "mensaje" => $mensaje,
        "date" => $fechaa
    );

    $client = new Crud();
    $db = $client->conect();

    $result = $client->insertData($db, $datoNuevo, "messages");

    $response = array("status" => true);

    exit (json_encode($datoNuevo));
?>
Footer
