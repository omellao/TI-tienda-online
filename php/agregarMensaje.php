<?php   
    require_once "conexion.php";

    class Crud extends Conexion{
        public function insertData($data) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->personas;
                $result = $coleccion->insertOne($data);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    $mensaje = $_POST['mensaje'];
    // echo $mensaje;

    // lo ideal es agregar la fecha como esto en los nuevos mensajes para luego ordenarlos
    //
    $fechaa = date('m-d-Y h:i:s a', time());
    $datoNuevo = ["user" => "usuario2","mensaje" => "$mensaje", "date" => $fechaa];
    $newData = new Crud();
    $noseKago = $newData->insertData($datoNuevo);
?>