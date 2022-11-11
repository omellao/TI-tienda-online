<?php    
    require_once "Crud.php";
    
    $newData = new Crud();
    $noseKago = $newData->insertData();

    $resp = array();    

    foreach ($noseKago as $item){
        $resp ["users"][]= $item;
    }
    exit (json_encode($resp));
?>
