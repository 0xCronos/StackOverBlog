<?php
//dependencias
require_once "../database/db.php";
require_once "../models/user.php";

$user = new User();

if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['description'])){
   
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $description = $_POST['description'];

    //Sanitiza inputs
    $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    
    //Comprueba email
    if($user->checkEmail($email)){
        echo "El correo electrónico ingresado está en uso";
        exit;
    }

    //Valida largo minimo y maximo de inputs
    $validationMessage = validateRegisterInput($fullname, $email, $password, $description);
    if(empty($validationMessage)){

        //Comprueba si se subio imagen de perfil
        if(is_uploaded_file($_FILES['image']['tmp_name'])){
    
            $validFileExtensions = array(".jpg", ".jpeg", ".png");
            $fileExtension = strchr($_FILES['image']['name'], ".");
            
            //Comprueba que sea un archivo con extension valida
            if(in_array($fileExtension, $validFileExtensions)){
                $fileName = md5($email).$fileExtension;
                $destination = "../assets/profiles-images/".$fileName;
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            }else{
                echo "archivo no permitido";
                exit;
            }
        }else{ //inserta imagen por defecto si no se especifica una
            $fileName = "default.png";
        }

        if($user->addUser($fullname, $email, $password, "/profiles-images/".$fileName, $description)){
            echo "usuario creado con exito";
        }else{
            echo "error al crear usuario, intente mas tarde";
        }
    }else{
        echo $validationMessage;
    }
}else{
    echo "faltan parametros";
}

function validateRegisterInput($fullname, $email, $password, $description){
    if(strlen($fullname) < 4 || strlen($fullname) > 35){
        return "Campo nombre no cumple con los requisitos.";
    }
    if(strlen($email) < 5 || strlen($email) > 255){
        return "Campo email no cumple con los requisitos";
    }
    if(strlen($password) < 8 || strlen($password) > 126){
        return "Campo password no cumple con los requisitos";
    }
    if(strlen($description) > 2048){
        return "Campo descripcion no cumple con los requisitos";
    }
    return "";
}

?>