<?php
    require_once "class/Crud.php";
    
    $client = new Crud();
    $db = $client->conect();

    $messages = $client->readDataMessages($db, $_POST['id_chat']);

    $response = array();
    foreach ($messages as $message) {
        $response['messages'][] = $message;
    }

    exit(json_encode($response));
?>
