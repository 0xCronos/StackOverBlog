<?php
//dependencias
require_once "../database/db.php";
require_once "../models/news.php";
require_once "../models/userSession.php";

$userSession = new UserSession();
$news = new News();
 
if($userSession->checkUserPrivileges()){
    if(isset($_POST['new_id'])){
        $new_id = $_POST['new_id'];
        
        //comprueba tipo de dato y valor para id
        if(is_numeric($new_id) && $new_id > 0){
            if($news->deleteNew($new_id)){
                echo "1";
            }else{
                echo "noticia con id: ".$new_id." no existe";
            }
        }else{
            echo "parametro id invalido";
        }
    }else{
        echo "parametro id no ingresado";
    }
}else{
    echo "no cumples con los privilegios minimos";
}
?>