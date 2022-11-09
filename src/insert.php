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

$db = new Crud();

$username = array("name" => $_POST['name']);
$useremail = array("email" => $_POST['email']);
$resultName = $db->readOneData($username);
$resultEmail = $db->readOneData($useremail);

if ($resultEmail || $resultName) {
    $response['status'] = "el nombre o email ya estan registrados";
    exit(json_encode($response));
}

$newUser['salt'] = genSalt();
$newUser['passwd'] = hash("sha512", "{$_POST['passwd']}.{$newUser['salt']}");

$result = $db->insertData($newUser);

$response['status'] = "todo bien, todo correcto, y yo que me alegro";
exit(json_encode($response));

?>