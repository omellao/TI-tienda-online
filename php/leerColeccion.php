<?php   
    
    require_once "conexion.php";

    class Crud extends Conexion{
        public function mostrarDatos() {
            try {
                $conexion = parent::conectar();
                // peronas es la coleccion
                $coleccion = $conexion->personas;
                $datos = $coleccion->find();
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMenssage();
            }
        }
    }

    $objeto = new Crud();
    $datoss = $objeto->mostrarDatos();

    // dejamos todos los datos de una coleccion a tipo JSON
    // para hacer cosas con js
    $respuesta = array();
    foreach($datoss as $item){
        $respuesta ["mensajes"][]=$item;
    }

    exit (json_encode($respuesta));
?>