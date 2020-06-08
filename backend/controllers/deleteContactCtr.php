<?php
//dependencias
require_once "../database/db.php";
require_once "../models/contacts.php";
require_once "../models/userSession.php";

$userSession = new UserSession();
$contacts = new Contacts();

if($userSession->checkUserPrivileges()){
    if(isset($_POST['contact_id'])){
        $contact_id = $_POST['contact_id'];

        //comprueba tipo de dato y valor para id
        if(is_numeric($contact_id) && $contact_id > 0){
            if($contacts->deleteContact($contact_id)){
                echo "1";
            }else{
                echo "no existe contacto con id: ".$contact_id;
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