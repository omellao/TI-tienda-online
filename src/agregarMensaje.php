<?php   
    require_once "conexion.php";

    class Crud extends Conexion{
        public function insertData($data) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->mensajes;
                $result = $coleccion->insertOne($data);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    $id = $_POST['id_chat'];

    $mensaje = $_POST['mensaje'];

    // lo ideal es agregar la fecha como esto en los nuevos mensajes para luego ordenarlos
    $fechaa = date('m-d-Y h:i:s a', time());
    $datoNuevo = ["id_chat" => $id,"mensaje" => "$mensaje", "date" => $fechaa];
    $newData = new Crud();
    $noseKago = $newData->insertData($datoNuevo);
?>