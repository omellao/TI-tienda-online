<?php

include_once 'vendor/autoload.php';
include_once "class/Crud.php";

$client = new Crud();
$db = $client->conect();

$response = array();

if (!$_POST['useroremail'] === "" || !$_POST['pwd'] === "") {
    $response['status'] = 1;
    exit(json_encode($response));
}


$postedUsernameEmail = $_POST['useroremail'];
$postedPassword = $_POST['pwd'];

$query = array(
    "\$or" => array(
        array("name" => $postedUsernameEmail),
        array("email" => $postedUsernameEmail)
    )
);

$userDb = $client->readOneData($db, $query); 

if (!$userDb) {
    $response['status'] = 2;
    exit(json_encode($response));
}

$pwd = hash("sha512", "{$_POST['pwd']}.{$userDb['salt']}");

if (!$pwd == $userDb['passwd']) {
    $response['status'] = 3;
    exit(json_encode($response));
}

session_start();

$response['status'] = 0;

$_SESSION['user'] = hash("sha512", "{$userDb['name']}:$pwd");
$_SESSION['priv_key'] = $userDb['priv_key'];
$_SESSION['pub_key'] = $userDb['pub_key'];

$response['loggin'] = array(
    "user" => $_SESSION['user'],
    "priv_key" => $_SESSION['priv_key'],
    "pub_key" => $_SESSION['pub_key'],
);

exit(json_encode($response));
?>
