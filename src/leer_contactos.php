<?php    
    require_once "class/Crud.php";
    
    $client = new Crud();
    $db = $client->conect();
    $users = $client->readData($db, "users");

    $response = array();

    foreach ($users as $user) {
        $response['users'][] = $user;
    }


    exit(json_encode($response));
?>
