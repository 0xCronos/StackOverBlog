<?php
//dependencias
require_once "../database/db.php";
require_once "../models/userSession.php";
require_once "../models/news.php";
require_once "../models/utils.php";

$session = new UserSession();
$new = new News();
$utils = new Utils();

if( $session->checkUserPrivileges() ){ 
    $data = $new->get5BestRatedNews();
    if($data){
        $utils->printJSON($data);
    }else{
        $utils->message("Aviso: No existen Votaciones o Noticias");
    }
}else{
    echo "Error: privilegios insuficientes";
}
?>
