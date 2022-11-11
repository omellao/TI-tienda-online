<?php   
    require_once "class_new/Crud.php";
    
    $user_login = "Colchones";
    $user2 = $_POST['user1'];

    
    // echo $user_2;
    $client = new Crud();
    $fechaa = date('m-d-Y h:i:s a', time());
    $datoNuevo = ["users" => [$user_login, $user2], "last_activity" => $fechaa];
    $result = $client->crearChat($datoNuevo);
    
    $response = array("status" => "todo bien");

    exit(json_encode($response));
   
?>