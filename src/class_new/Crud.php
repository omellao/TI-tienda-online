<?php 
    require_once "Conexion.php";

    class Crud extends Conexion{
        public function insertData() {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->users;
                $result = $coleccion->find();
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function crearChat($dato) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->chats;
                $result = $coleccion->insertOne($dato);
                return $result;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function readData() {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->mensajes;
                $result = $coleccion->insertOne();
                return $result;

            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function readChats() {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->chats;
                $result = $coleccion->find();
                return $result;

            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function readMensajes($dato) {
            try {
                $conexion = parent::conectar();
                $coleccion = $conexion->mensajes;
                $result = $coleccion->find($dato);
                return $result;

            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        public function insertMensajes($data) {
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
?>