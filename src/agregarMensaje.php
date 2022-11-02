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

    // $user_1 = $_POST['usuario1'];
    // $user_2 = $_POST['usuario2'];

    $user_1 = "Cochones";
    $user_2 = "Ozk";

    $mensaje = $_POST['mensaje'];
    // echo $mensaje;
    // lo ideal es agregar la fecha como esto en los nuevos mensajes para luego ordenarlos
    $fechaa = date('m-d-Y h:i:s a', time());
    $datoNuevo = ["emisor" => $user_1,"receptor" => $user_2,"mensaje" => "$mensaje", "date" => $fechaa];
    $newData = new Crud();
    $noseKago = $newData->insertData($datoNuevo);
?>