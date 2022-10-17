<?php

require_once "/home/oscar/public_html/vendor/autoload.php";

class Conection {
    public function conect() {
        try {
            $host = "127.0.0.1";
            $user = "admin";
            $pwd = "123455";
            $dataBase = "proyect";
            $port = "27017";

            $client = new MongoDB\Client("mongodb://".$user.":".$pwd."@".$host.":".$port."/".$dataBase);
            return $client->selectDatabase($dataBase);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

?> 
