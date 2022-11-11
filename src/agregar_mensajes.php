<?php   
    require_once "class_new/Crud.php";

    $id = $_POST['id_chat'];
    $emisor = $_POST['emisor'];
    $mensaje = $_POST['mensaje'];

    // FECHA 
    $fechaa = date('m-d-Y h:i:s a', time());

    $datoNuevo = ["id_chat" => $id,"emisor"=>$emisor,"mensaje" => "$mensaje", "date" => $fechaa];
    $newData = new Crud();
    $noseKago = $newData->insertMensajes($datoNuevo);

    $resp = array();

    foreach ($noseKago as $item){
        $resp ["mensajes"][]= $item;
    }
    exit (json_encode($resp));
?>