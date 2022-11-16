<?php   
    require_once "class/Crud.php";

    session_start();
    
    $user_login = $_SESSION['username'];
    $user = $_POST['user'];
    
    // echo $user_2;
    $client = new Crud();
    $db = $client->conect();
    $fechaa = date('m-d-Y h:i:s a', time());

    $datoNuevo = array(
        "users" => array($user_login, $user), 
        "last_activity" => $fechaa
    );

    $result = $client->insertData($db, $datoNuevo, "chats");
    
    $response = array("status" => "todo bien");

    exit(json_encode($response));
   
?>
