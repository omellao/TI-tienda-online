<?php   
    require_once "conexion.php";

    class Crud extends Conexion{
        public function actualizarName($data, $data2) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->users;
                $result = $coleccion->updateOne(
                    ['_id'=> new MongoDB\BSON\ObjectId($data)],['$set'=>$data2]
                );
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    $init = new Crud();

    // se necesita identificar al usuario, ojala sea el id
    $user = "6341c1fda5d721dde60f87c5";
    $datos = array(
        "user"=> $_POST['nombrenuevo']
    );



    $borrar = $init->actualizarName($user, $datos);
?>