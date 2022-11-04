 <?php

include_once (dirname(__FILE__)). '/../vendor/autoload.php';

class Conection {
    public function conect() {
        try {
            include_once "config.php";

            $client = new MongoDB\Client(
                "mongodb://$user:$pwd@$host/$db?retryWrites=true&w=majority"
            );
            return $client->selectDatabase($db);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /* public function disconect($db) { */
    /*     $db->close(); */
    /* } */
}

/* $wea = new Conection(); */

/* var_dump($wea); */

?> 
