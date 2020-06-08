<?php 
//dependencias
require_once "../database/db.php";
require_once "../models/contacts.php";
require_once "../models/userSession.php";
require_once "../models/utils.php";

$userSession = new UserSession();
$contacts = new Contacts();
$utils = new Utils();

if($userSession->checkUserPrivileges()){
    $data = $contacts->getContacts();
    if($data){
        $utils->printJSON($data);
    }else{
        $utils->message("No han llegado mensajes");
    }
}else{
    echo "no cumples con los privilegios minimos";
}
?>