<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/categories.php";

$userSession = new UserSession();
$category = new Categories();

if($userSession->checkUserPrivileges()){

    if(isset($_POST['category_name'])){
        $category_name = $_POST['category_name'];
        $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_STRING);
        if(strlen($category_name) > 0 && strlen($category_name) <= 35){
            if($category->addCategory($category_name)){
                echo "1";
            }else{
                echo "ya existe una categoria con este nombre";
            }
        }else{
            echo "Error: El parametro debe tener entre 1 y 35 caracteres";
        }
    }else{
        echo "Error: Parametros insuficientes";
    }
}else{
    echo "Error: privilegios insuficientes";
}
?>
