<?php
//dependencias
require_once "../database/db.php";
require_once "../models/news.php";
require_once "../models/userSession.php";

$userSession = new UserSession();
$news = new News();

if($userSession->checkUserPrivileges()){
    
    if(isset($_POST['new_id']) && isset($_POST['new_title']) && isset($_POST['new_body']) && isset($_POST['state_id']) && isset($_POST['category_id'])){
        $new_id = $_POST['new_id'];
        $new_title = $_POST['new_title'];
        $new_body = $_POST['new_body'];
        $state_id = $_POST['state_id'];
        $category_id = $_POST['category_id'];

        //sanitiza inputs
        $new_title = filter_var($new_title, FILTER_SANITIZE_STRING);
        $new_body = filter_var($new_body, FILTER_SANITIZE_STRING);

        //Comprueba valores numericos (no valida author_id, validado en controlador de inicio de sesion)
        if(is_numeric($state_id) && $state_id > 0 && is_numeric($category_id) && $category_id > 0){

            $validationMessage = validateInput($new_title, $new_body);
            if(empty($validationMessage)){

                //Comprueba si se subio imagen a la noticia
                if(is_uploaded_file($_FILES['image']['tmp_name'])){
            
                    $validFileExtensions = array(".jpg", ".jpeg", ".png");
                    $fileExtension = strchr($_FILES['image']['name'], ".");
                    
                    //Comprueba que sea un archivo con extension valida
                    if(in_array($fileExtension, $validFileExtensions)){
                        $fileName = "/news-images/".generateRandomString().$fileExtension;
                        $destination = "../assets".$fileName;
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                        //borra imagen antigua de los archivos
                        $oldImagePath = '../assets'.$news->getImagePathOfNew($new_id);
                        unlink($oldImagePath);
                    }else{
                        echo "archivo no permitido";
                        exit;
                    }
                }else{ //deja imagen actual
                    $fileName = null;
                }

                //Modifica noticia (si $fileName = null se mantiene imagen antigua)
                if($news->modifyNew($new_id, $new_title, $new_body, $fileName, $state_id, $category_id)){
                    echo "1";
                }else{
                    echo "error al crear noticia";
                }
            }else{
                echo $validationMessage;
            }
        }else{
            echo "parametros id invalido/s";
        }
    }else{
        echo "faltan parametros";
    }
}else{
    echo "no cumples con los privilegios minimos";
}

function validateInput($title, $body){
    if(strlen($title) < 4 || strlen($title) > 45){
        return "Campo titulo no cumple con los requisitos.";
    }
    if(strlen($body) < 100 || strlen($body) > 2048){
        return "Campo cuerpo noticia no cumple con los requisitos";
    }
    return "";
}

function generateRandomString($length = 32) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>