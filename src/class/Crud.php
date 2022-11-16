<?php

include_once (dirname(__FILE__)).'/Conection.php';

class Crud extends Conection {
    public function readData($db, $coll) {
        try {
            $collection = $db->selectCollection($coll);
            $data = $collection->find();
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readDataMessages($db, $id_chat) {
        try {
            $collection = $db->selectCollection("messages");
            $data = $collection->find(array("id_chat" => $id_chat));
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function readOneData($db, Array $filter, $coll) {
        try {
            $collection = $db->selectCollection($coll);
            $data = $collection->findOne($filter);
            return $data;

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function insertData($db, Array $data, $coll) {
        try {
            $collection = $db->selectCollection($coll);
            $result = $collection->insertOne($data);
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function deleteUser($db, $data) {
        try {
            $coleccion = $db->selectCollection("users");
            $result = $coleccion->deleteOne(array("name" => $data));
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

?>

