<?php    
    require_once "class/Crud.php";

    session_start();
    
    $username = $_SESSION['username'];
    $client = new Crud();
    $db = $client->conect();

    $chats = $client->readData($db, "chats");

    $response = array();

    foreach ($chats as $item){
        if ($item['users'][0] === $username || $item['users'][1] === $username) {
            $response ["chats"][]= $item;
        }
    }
    exit (json_encode($response));
?>
