<?php

include_once 'vendor/autoload.php';
include_once "class/Crud.php";

session_start();

$response = array();

if (isset($_SESSION['username'])) {
    $response['status'] = true;
    $response['msg'] = "Ya estas en una sesión";
    exit(json_encode($response));
}

$client = new Crud();
$db = $client->conect();


if (!$_POST['useroremail'] === "" || !$_POST['passwd'] === "") {
    $response['status'] = false;
    $response['msg'] = "Falta alguno de los campos";
    exit(json_encode($response));
}


$postedUsernameEmail = $_POST['useroremail'];
$postedPassword = $_POST['passwd'];

$query = array(
    "\$or" => array(
        array("username" => $postedUsernameEmail),
        array("email" => $postedUsernameEmail)
    )
);

$userDb = $client->readOneData($db, $query, "users"); 

if (!$userDb) {
    $response['status'] = false;
    $response['msg'] = "El nombre de usuario o el email no se encuentran registrados";
    exit(json_encode($response));
}

$match = password_verify($_POST['passwd'], $userDb['pwd']);

if (!$match) {
    $response['status'] = false;
    $response['msg'] = "La contraseña es incorrecta";
    exit(json_encode($response));
}


$response['status'] = true;
$response['msg'] = "Se ha iniciado sesión correctamente";

$_SESSION['username'] = $userDb['username'];
$_SESSION['priv_key'] = $userDb['priv_key'];
$_SESSION['pub_key'] = $userDb['pub_key'];

exit(json_encode($response));

?>
