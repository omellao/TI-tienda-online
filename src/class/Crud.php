<?php

require_once "/home/oscar/public_html/class/Conection.php";

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

    public function insertData($data) {
        try {
            $conection = parent::conect();
            $collection = $conection->users;
            $result = $collection->insertOne($data);
            return $result;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

?>

