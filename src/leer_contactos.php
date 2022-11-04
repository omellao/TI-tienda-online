<?php   
    include_once "class/Crud.php";
    
    $client = new Crud();
    $db = $client->conect();
    
    $data = $client->readData($db);
    var_dump($data);

    // foreach($data as $item){
    //     var_dump($item);
    // }

?>