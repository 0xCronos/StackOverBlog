<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/categories.php";

$session = new UserSession();
$category = new Categories();

if($session->checkUserPrivileges()){
    if(isset($_POST['category_id'])){
        $category_id = $_POST['category_id'];

        if(is_numeric($category_id) && $category_id > 0){

            if($category->getCategoryById($category_id)){

                if($category->deleteCategory($category_id)){
                    echo "1";
                }else{
                    echo "Error: id inexistente";
                }
            }else{
                echo "Error: Categoria inexistente";
            }
        }else{
            echo "Error: Parametro id invalido";
        }
    }else{
        echo "Error: Faltan parametros";
    }
}else{
    echo "Error: privilegios insuficientes";
}
?>
