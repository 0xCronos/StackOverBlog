<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/comments.php";

$userSession = new UserSession();
$comments = new comments();

//Comprueba si hay un usuario con sesion iniciada
if(!$userSession->checkSession()){
    echo "inicia sesion primero";
    return;
}

if(isset($_POST['user_id']) && isset($_POST['new_id']) && isset($_POST['comment_text'])){
    $user_id = $_POST['user_id'];
    $new_id = $_POST['new_id'];
    $comment_text = filter_var($_POST['comment_text'], FILTER_SANITIZE_STRING);

    //comprobacion de valores y tipos de datos ingresados
    if(is_numeric($user_id) && is_numeric($new_id) && $user_id > 0 && $new_id > 0 && strlen($comment_text) > 0 && strlen($comment_text) < 255){
        if($comments->addComment($user_id, $new_id, $comment_text)){
            echo "1";
        }else{
            echo "error al enviar comentario";
        }
    }else{
        echo "parametro id invalido";
    }
}else{
    echo "faltan parametros";
}

?>