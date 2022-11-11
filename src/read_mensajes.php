<?php    
    require_once "class_new/Crud.php";
    
    $newData = new Crud();

    $id_chatt = $_POST["id_chat2"];
    $dato = ['id_chat'=>$id_chatt];
    $noseKago = $newData->readMensajes($dato);

    $resp = array();

    foreach ($noseKago as $item){
        $resp ["mensajes"][]= $item;
    }
    exit (json_encode($resp));
?>