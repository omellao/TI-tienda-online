<?php

include_once (dirname(__FILE__)).'/Conection.php';

class Crud extends Conection {
    public function getCollectionUsers($db) {
        try {
            $collection = $db->selectCollection("users");
            return $collection;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readData($db) {
        try {
            $collection = $db->selectCollection("users");
            $data = $collection->find();
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readOneData($db, Array $filter) {
        try {
            $collection = $db->selectCollection("users");
            $data = $collection->findOne($filter);
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertData($db, Array $data) {
        try {
            $collection = $db->selectCollection("users");
            $result = $collection->insertOne($data);
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteUser($db, $data) {
        try {
            $coleccion = $db->selectCollection("users");
            $result = $coleccion->deleteOne(
                array(
                    "name"=>$data
                )
            );
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /* public function actualizarName($data, $data2) { */
    /*     try { */
    /*         $conexion = parent::conect(); */
    /*         $coleccion = $conexion->selectCollection("users"); */
    /*         $result = $coleccion->updateOne( */
    /*             ['_id'=> new MongoDB\BSON\ObjectId($data)],['$set'=>$data2] */
    /*         ); */
    /*         return $result; */
    /*     } catch (\Throwable $th) { */
    /*         return $th->getMessage(); */
    /*     } */
    /* } */
}


$client = new Crud();
$db = $client->conect();

$result = $client->deleteUser($db, "admin");

var_dump($result);

$data = $client->readData($db);

foreach ($data as $wea) {
    var_dump($wea);
}

?>

