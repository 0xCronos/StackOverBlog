<?php
class UserSession{
   
    //Inicializa sesion
    public function __construct(){
        session_start();
    }

    //Crea sesion con los datos de usuarios
    public function setCurrentUser($user){
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_fullname'] = $user['user_fullname'];
        $_SESSION['user_email'] = $user['user_email'];
        $_SESSION['user_image'] = $user['user_image'];
        $_SESSION['user_description'] = $user['user_description'];
        $_SESSION['user_image'] = $user['user_image'];
        $_SESSION['user_role'] = $user['role_name'];
    }

    //comprueba si el usuario es administrador
    public function checkUserPrivileges(){
        if(isset($_SESSION['user_role'])){
            return ($_SESSION['user_role'] == "admin") ? true : false;
        }else{
            return false;
        }
    }

    public function checkSession(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }

    //Cierra sesion
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>