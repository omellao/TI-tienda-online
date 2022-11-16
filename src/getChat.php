<?php

include_once "class/Crud.php";

session_start();

$username = $_SESSION['username'];

$client = new Crud();
$db = $client->conect();

$chat = $client->readOneData($db, array("_id" => ["oid" => $_POST['id']]), "chats");

exit(json_encode($chat));

?>
