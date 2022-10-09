<?php
    require_once "../vendor/autoload.php";
    class Conexion {
        public function conectar() {
            try {
                $servidor = "127.0.0.1"; #o la ip
                $usuario = "mongoadmin";
                $password = "123456";
                $baseDatos = "crud";
                $puerto = "27017";

                # cadena de conexion
                $cadenaConexion = "mongodb://".$usuario.":".$password."@".$servidor.":".$puerto."/".$baseDatos;

                $cliente = new MongoDB\Client($cadenaConexion);
                return $cliente->selectDatabase($baseDatos);
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
    } 
?>