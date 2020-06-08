<?php
//dependencias
require_once "../database/db.php";
require_once "../models/user.php";
require_once "../models/userSession.php";

$userSession = new UserSession();
$user = new User();

//Comprueba si el usuario inicio sesion
if(!$userSession->checkSession()){
    echo "no existe sesión";
    return;
}

if(isset($_POST['user_id'])){

    //Comprueba que el id de usuario sea igual a la sesion actual
    if($_POST['user_id'] != $_SESSION['user_id']){
        echo "no eres usuario de esta cuenta";
        return;
    }

    $user_id = $_POST['user_id'];
    $validador = 1;

    //Comprueba que usuario existe
    $infoUser = $user->getUserById($user_id);
    if($infoUser){

        //nuevo full name user
        if(isset($_POST['user_fullname'])){
            if(validateNameUser($_POST['user_fullname'])){
                $user_fullname = $_POST['user_fullname'];
                $user_fullname = filter_var($user_fullname, FILTER_SANITIZE_STRING);
            }else{
                $validador = 0;
            }
        }else{
            $user_fullname = $infoUser['user_fullname'];
        }

        //nueva $password
        if(isset($_POST['user_password'])){
                $user_password = $_POST['user_password'];
                $user_password = md5($user_password);
        }else{
            $user_Oldpassword = $user->getUserPasswordById($user_id);
            $user_password = $user_Oldpassword['user_password'];
        }

        //nueva description user
        if(isset($_POST['user_description'])){
            if(validateDescription($_POST['user_description'])){
                $user_description = $_POST['user_description'];
                $user_description = filter_var($user_description, FILTER_SANITIZE_STRING);
            }else{
                $validador = 0;
            }
        }else{
            $user_description = $infoUser['user_description'];
        }

        //Comprueba si se subio imagen a la noticia
        if(is_uploaded_file($_FILES['user_image']['tmp_name'])){
    
            $validFileExtensions = array(".jpg", ".jpeg", ".png");
            $fileExtension = strchr($_FILES['user_image']['name'], ".");
            
            //Comprueba que sea un archivo con extension valida
            if(in_array($fileExtension, $validFileExtensions)){
                $fileName = "/profiles-images/".(md5($_SESSION['user_email'])).$fileExtension;
                $destination = "../assets".$fileName;
                move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);

                //borra imagen antigua de los archivos si no es la imagen por defecto
                $oldImagePath = '../assets'.$user->getImagePathOfUser($user_id);
                if($oldImagePath != "../assets/profiles-images/default.jpg"){
                    unlink($oldImagePath);
                }
            }else{
                $validador = 0;
            }
        }else{ //deja imagen actual
            $fileName = null;
        }

        //si los nuevos parametros fueron escritos de manera correcta
        if($validador){
            $user->updateUser($user_id, $user_fullname, $user_password, $fileName, $user_description);
            echo "1";
        }else{
            echo "parametros incorrectos";
        }
    }else{
        echo "Error: No existe usuario con ese id";
    }
}else{
    echo "parametros insuficientes";
}

function validateNameUser($user_fullname){
    if(strlen($user_fullname) < 4 || strlen($user_fullname) > 35){
        return false;
    }
    return true;
}

function validateDescription($user_description){
    if(strlen($user_description) > 2048){
        return false;
    }
    return true;
}
?>
