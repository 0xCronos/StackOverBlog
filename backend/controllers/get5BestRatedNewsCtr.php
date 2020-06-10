<?php
//dependencias
require_once "../database/db.php";
require_once "../models/news.php";
require_once "../models/utils.php";

$new = new News();
$utils = new Utils();

$data = $new->get5BestRatedNews();
if($data){
    $utils->printJSON($data);
}else{
    $utils->message("Aviso: No existen Votaciones o Noticias");
}
?>
