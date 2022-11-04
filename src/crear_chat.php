<?php   
    require_once "class/Crud.php";
    
    $user_1 = "Colchones";
    $user_2 = "Ozk";

    $client = new Crud();
    $db = $client->conect();
    
    $fechaa = date('m-d-Y h:i:s a', time());
    
    $datoNuevo = ["users" => [$user_1, $user_2], "last_activity" => $fechaa];
    
    $result = $client->insertData($db,$datoNuevo);
?>