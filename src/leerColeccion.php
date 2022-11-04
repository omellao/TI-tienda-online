<?php   
    
    require_once "class/Crud.php";

    $ID = $_POST[''];
 
    $objeto = new Crud();
    $datoss = $objeto->mostrarChat($user_1,$user_2);

    // dejamos todos los datos de una coleccion a tipo JSON
    // para hacer cosas con js
    $respuesta = array();

    foreach($datoss as $item){
        $respuesta ["mensajes"][]=$item;
    }

    exit (json_encode($respuesta));
?>