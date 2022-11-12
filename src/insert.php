<?php

include_once (dirname(__FILE__)).'/class/Crud.php';

function genSalt($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} 

$newUser = array(
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "passwd" => "",
    "salt" => "",
    "avatar" => "../views/img/Usuario.png",
    "lastchat" => "",
    "priv_key" => $_POST['priv_key'],
    "pub_key" => $_POST['pub_key']
);

$response = array();

if ($_POST['passwdverify'] ==! $_POST['passwd'] ||
    $_POST['name'] == null || $_POST['email'] == null) {

    $response['status'] = "falta algún campo o las contraseñas no son iguales";
    exit(json_encode($response));
}

$client = new Crud();
$db = $client->conect();

$resultName = $client->readOneData($db, array("name" => $_POST['name']));
$resultEmail = $client->readOneData($db, array("email" => $_POST['email']));


if ($resultEmail != NULL || $resultName != NULL) {
    $response['status'] = "el nombre o email ya estan registrados";
    $response['result'] = array($resultName, $resultEmail);
    exit(json_encode($response));
}


$newUser['salt'] = genSalt();
$newUser['passwd'] = hash("sha512", "{$_POST['passwd']}.{$newUser['salt']}");

$result = $db->selectCollection("users")->insertOne($newUser);

$response['status'] = "todo bien, todo correcto, y yo que me alegro";
exit(json_encode($response));

?>
