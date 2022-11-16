<?php

include_once (dirname(__FILE__)).'/class/Crud.php';

$newUser = array(
    "username" => $_POST['username'],
    "email" => $_POST['useremail'],
    "pwd" => "",
    "avatar" => "../views/img/Usuario.png",
    "lastchat" => "",
    "priv_key" => $_POST['priv_key'],
    "pub_key" => $_POST['pub_key']
);

$response = array();

if ($_POST['pwdVerify'] ==! $_POST['pwd'] ||
    $_POST['username'] == null || $_POST['useremail'] == null) {

    $response['status'] = "falta algún campo o las contraseñas no son iguales";
    exit(json_encode($response));
}

$client = new Crud();
$db = $client->conect();

$resultName = $client->readOneData($db, array("name" => $_POST['username']), "users");
$resultEmail = $client->readOneData($db, array("email" => $_POST['useremail']), "users");


if ($resultEmail != NULL || $resultName != NULL) {
    $response['status'] = "el nombre o email ya estan registrados";
    $response['result'] = array($resultName, $resultEmail);
    exit(json_encode($response));
}


$newUser['pwd'] = password_hash($_POST['pwd'], PASSWORD_BCRYPT);

$result = $client->insertData($db, $newUser, "users");

$response['status'] = "todo bien, todo correcto, y yo que me alegro";
exit(json_encode($response));

?>
