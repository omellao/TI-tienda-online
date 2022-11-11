<?php    
    require_once "class_new/Crud.php";
    
    $newData = new Crud();
    $noseKago = $newData->readChats();

    $resp = array();

    foreach ($noseKago as $item){
        $resp ["chats"][]= $item;
    }
    exit (json_encode($resp));
?>