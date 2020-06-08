<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/categories.php";

$session = new UserSession();
$category = new Categories();

if($session->checkUserPrivileges()){ 
    if(isset($_POST['category_name']) && isset($_POST['category_id'])){
            $category_name = filter_var($_POST['category_name'], FILTER_SANITIZE_STRING);

            $category_id = $_POST['category_id'];
            if(is_numeric($category_id) && $category_id > 0){

                if(strlen($category_name) > 0 && strlen($category_name) <= 35){

                    if($category->getCategoryById($category_id) != null){

                        $category->updateCategory($category_name, $category_id);
                        echo "1";

                    }else{
                        echo "Error: Categoria inexistente";
                    }

                }else{
                    echo "Error: el nombre de la categoria debe tener entre 1 y 35 caracteres";
                }
            }else{
                echo "Error: id mal ingresado";
            }

    }else{
        echo "Erro: Parametros invalidos";
    }

}else{
    echo "Error: privilegios insuficientes";
}
?>
