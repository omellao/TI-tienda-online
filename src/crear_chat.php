<?php   
    require_once "conexion.php";

    $nombre_chat = $_POST['nombre_chat'];

    class Crud extends Conexion{
        public function insertData($data, $chat) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->$chat;
                $result = $coleccion->insertOne($data);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    // lo ideal es agregar la fecha como esto en los nuevos mensajes para luego ordenarlos
    
    $datoNuevo = ["user" => "bot","mensajeWelcom" => "Chat nuevo", "date" => $fechaa];
    $newData = new Crud();
    $noseKago = $newData->insertData($datoNuevo, $nombre_chat);
?>