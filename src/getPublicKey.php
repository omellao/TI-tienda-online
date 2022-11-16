<?php

include_once "vendor/autoload.php";
include_once "class/Crud.php";
session_start();

$username = $_SESSION['username'];

$client = new Crud();
$db = $client->conect();


$chat = $client->readOneData($db, array("_id" => new MongoDB\BSON\ObjectId($_POST['id'])), "chats");

$recep = "";
foreach ($chat['users'] as $user) {
    if ($user != $username) {
        $recep = $user;
    }
}

$user = $client->readOneData($db, array("username" => $recep), "users");

exit(json_encode($user['pub_key']));

?>
