<?php
//dependencias
require_once "../database/db.php";
require_once "../models/user.php";
require_once "../models/utils.php";

$user = new User();
$utils = new Utils();

$data = $user->getOwner();
if($data){
    $utils->printJSON($data);
}else{
    $utils->message("Aviso: no existe un dueño del blog aun");
}
?>