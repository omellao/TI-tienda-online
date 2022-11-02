<?php   
    require_once "conexion.php";

    $nombre_chat = $_POST['nombre_chat'];

    class Crud extends Conexion{
        public function insertData($data) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->chats;
                $result = $coleccion->insertOne($data);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    // $user_1 = $_POST['usuario1'];
    // $user_2 = $_POST['usuario2'];

    $user_1 = "Cochones";
    $user_2 = "Ozk";

    $fechaa = date('m-d-Y h:i:s a', time());
    $datoNuevo = ["users" => [$user_1, $user_2], "ultima_accion" => $fechaa];
    $newData = new Crud();
    $noseKago = $newData->insertData($datoNuevo);
?>