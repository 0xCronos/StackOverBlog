<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/comments.php";

$userSession = new UserSession();
$comments = new Comments();

if($userSession->checkUserPrivileges()){
    if(isset($_POST['comment_id'])){
        $id = $_POST['comment_id'];
        
        //comprueba tipo de dato y valores para id
        if(is_numeric($id) && $id > 0){
            if($comments->deleteComment($id)){
                echo "1";
            }else{
                echo "el comentario no existe";
            }
        }else{
            echo "parametro id invalido";
        }
    }else{
        echo "faltan parametros";
    }
}else{
    echo "no cumples con los privilegios minimos";
}
?>

