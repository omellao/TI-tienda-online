<?php
require '../vendor/autoload.php';
require_once "Conexion.php";

$collection = $db->users;

if($_POST){

    $uname = $_POST['name'];
    $pwd = $_POST['pass'];

    $cursor = $collection->find(array('name' => $uname, 'pass' => password_hash($pwd) ));

    foreach ($cursor as $doc){
      echo $doc["firstName"];
    }
}

$newUser = array(
    "name" => $_POST['name'],
    "passwd" => $_POST['pass'],
    "salt" => "",
);

$response = array();

if(isset($_POST['login'])){
		
    $postedUsername = $_POST['name']; 
    $postedPassword = $_POST['pass']; 
    $db = $collection;
    $userDbFind = $db->find(array('name' => $postedUsername)); 
        
        
        foreach($userDbFind as $userFind) {
            $Username = $userFind['name'];
            $Password = $userFind['pass'];
        }

        if($postedUsername == $Username && $postedPassword == $Password){ 
            $_SESSION['authentication'] = 1;
            ?>
            
            <script type="text/javascript">
            window.location = "index.html"
            </script> <?php
            
        }else{
            
            $wrongflag = 1;
        }
        
    }else{}

?>
