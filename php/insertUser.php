<?php   
    require_once "conexion.php";

    class Crud extends Conexion{
        public function insertData($data) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->users;
                $result = $coleccion->insertOne($data);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    }

    $user = $_POST['name'];
    $email = $_POST['email'];
    $contraseña = $_POST['pass'];
    // echo $mensaje;

    // lo ideal es agregar la fecha como esto en los nuevos mensajes para luego ordenarlos
    //
    $datoNuevo = ["name" => "$user", "email" => "$email", "pass" => "$contraseña",];
    $newData = new Crud();
    $noseKago = $newData->insertData($datoNuevo);
?>