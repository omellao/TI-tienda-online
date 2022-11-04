<?php   
    
    require_once "conexion.php";

    class Crud extends Conexion{
        public function mostrarChat($Us1, $Us2) {
            try {
                $conexion = parent::conectar();
                // peronas es la coleccion
                $coleccion = $conexion->mensajes;
                $datos = $coleccion->find(array('emisor'=>$Us1,'receptor'=>$Us2));
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMenssage();
            }
        }
    }

    // $user_1 = $_POST['usuario1'];
    // $user_2 = $_POST['usuario2'];

    $user_1 = "Cochones";
    $user_2 = "Ozk";

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