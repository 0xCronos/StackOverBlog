<?php
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/user.php";

$userSession = new UserSession();
$user = new User();

//credencialess validas
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password  = $_POST['password'];

    $currentUser = $user->checkUser($email, $password);

    //usuario existe
    if($currentUser){
        //Inicia sesion y guarda datos de usuario en $_SESSION
        $userSession->setCurrentUser($currentUser);
        echo ($userSession->checkUserPrivileges()) ? "admin" : "user";
    }else{
        echo "Nombre de usuario y/o contraseña incorrecto";
    }
}else{
    echo "Parametros invalidos";
}
?>