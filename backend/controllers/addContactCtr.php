<?php
require_once "../database/db.php";
require_once "../models/contacts.php";


$contact = new Contacts();

if(isset($_POST['contact_fullname']) && isset($_POST['contact_email']) && isset($_POST['contact_text'])){

    $contact_fullname = filter_var($_POST['contact_fullname'], FILTER_SANITIZE_STRING);
    $contact_email = filter_var($_POST['contact_email'], FILTER_SANITIZE_EMAIL);
    $contact_text = filter_var($_POST['contact_text'], FILTER_SANITIZE_STRING);

    if(strlen($contact_fullname) > 0 && strlen($contact_email) > 0 && strlen($contact_text) > 0){
        if(strlen($contact_fullname) <= 120 && strlen($contact_email) <= 255 && strlen($contact_text) <= 2048){
            if($contact->addContact($contact_fullname, $contact_email, $contact_text)){
                echo "1";
            }else{
                echo "envio fallido";
            }
        }else{
            echo "uno o mas parametros son invalidos";
        }
    }else{
        echo "uno o mas parametros son invalidos";
    }
}else{
    echo "parametros insuficientes";
}

?>
