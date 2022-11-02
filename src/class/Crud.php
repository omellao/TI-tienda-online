<?php

include_once (dirname(__FILE__)).'/Conection.php';

class Crud extends Conection {
    public function getCollectionUsers() {
        try {
            $conection = parent::conect();
            $collection = $conection->users;
            return $collection;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readData() {
        try {
            $conection = parent::conect();
            $collection = $conection->users;
            $data = $collection->find();
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readOneData(Array $filter) {
        try {
            $conection = parent::conect();
            $collection = $conection->users;
            $data = $collection->findOne($filter);
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertData(Array $data) {
        try {
            $conection = parent::conect();
            $collection = $conection->users;
            $result = $collection->insertOne($data);
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteUser($data) {
        try {
            $conexion = parent::conect();
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

    public function actualizarName($data, $data2) {
        try {
            $conexion = parent::conect();
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

?>

