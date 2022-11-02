<?php   
    require_once "conexion.php";

    class Crud extends Conexion{
        public function deleteUser($data) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->users;
                $result = $coleccion->deleteOne(
                    array(
                        "user"=>$data
                    )
                );
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    // se necesita identificar al usuario, ojala sea el id
    $user = $_POST['user'];

    $init = new Crud();
    $borrar = $init->deleteUser($user);
?>