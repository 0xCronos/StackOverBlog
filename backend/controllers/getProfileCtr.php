<?php 
//dependencias
require_once "../database/db.php";
require_once "../models/user.php";
require_once "../models/utils.php";

$user = new User();
$utils = new Utils();

if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];

    if(is_numeric($user_id) && $user_id > 0){
        $data = $user->getUserById($user_id);
        if($data){
            $utils->printJSON($data);
        }else{
            $utils->message("no existe usuario");
        }
    }else{
        $utils->message("parametro id invalido");
    }
}else{
    $utils->message("faltan parametros");
}
?>