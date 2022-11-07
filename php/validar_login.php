<?php
require '../vendor/autoload.php';
require_once "Conexion.php";
session_start();

$collection = $db->users;
$user = $_POST['name'];
$passwd = $_POST['pass'];

if(isset($_POST['login'])){	
    $user = $_POST['name'];
    $passwd = $_POST['pass'];
    $db = $collection;
    $userDb = $db->find(array('name' => $user)); 

        foreach($userDb as $userFind) {
            $username = $userFind['name'];
            $password = $userFind['pass'];
        }
        if($user == $username && $passwd == $password){ 
            $_SESSION['usuario'] = $user;
            header("location: Home.html");
            exit();
        }else{
            ?>
            <script>
                alert("Usuario ingresado no existe, por favor verifique los datos introducidos");
                window.location = "login.php";
            </script>
            <?php
            exit();
        }
    }

?>