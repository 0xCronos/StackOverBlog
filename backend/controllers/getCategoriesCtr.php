<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/categories.php";
require_once "../models/utils.php";

$session = new UserSession();
$category = new Categories();
$utils = new Utils();

if($session->checkUserPrivileges()){
    $data = $category->getCategories();
    if($data){
        $utils->printJSON($data);
    }else{
        $utils->message("Aviso: Aun no existen categorias agregadas");
    }
}else{
    echo "Error: privilegios insuficientes";
}
?>
