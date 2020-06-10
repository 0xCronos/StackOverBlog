<?php 
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/utils.php";

$userSession = new UserSession(); 
$utils = new Utils();

if($userSession->checkSession()){
    $utils->printJSON(['user_id' => $_SESSION['user_id']]);
}else{
    $utils->printJSON(['user_id' => '0']);
}