 <?php

include_once (dirname(__FILE__)). '/../vendor/autoload.php';

class Conection {
    public function conect() {
        try {
            $db = "proyect";
            $host = "127.0.0.1";
            $pwd = "123455";
            $user = "admin";
            $port = "27017";

            $client = new MongoDB\Client(
                "mongodb://".$user.":".
                $pwd."@".$host.":".
                $port."/".$db);
            return $client->selectDatabase($db);
            /* return $client; */
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

/* $db = new Conection(); */

/* $wea = $db->conect(); */

/* var_dump($wea); */

?> 
