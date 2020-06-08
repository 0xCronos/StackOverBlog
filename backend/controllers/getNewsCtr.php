<?php
//dependencias
require_once "../database/db.php";
require_once "../models/news.php";
require_once "../models/utils.php";
require_once "../models/userSession.php";

$userSession = new UserSession();
$news = new News();
$utils = new Utils();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //buscar noticia especifica
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        //comprueba tipo de dato y valores para id
        if(is_numeric($id) && $id > 0){
            //comprueba si existen datos
            $data = $news->getNew($id);
            if($data){
                $utils->printJSON($data);
            }else{
                $utils->message("no existe la noticia con id: ".$id);
            }
        }else{
            $utils->message("id invalido");
        }
    }else{
        if(isset($_GET['amount'])){
            //muestra una cantidad de noticias
            $amount = $_GET['amount'];
            if(is_numeric($amount) && $amount > 0){
                //Comprueba si existen datos
                $data = $news->getNews("public", "desc", $amount);
                if($data){
                    $utils->printJSON($data);
                }else{
                    $utils->message("todavia no se han cargado noticias");
                }
            }else{
                $utils->message("cantidad invalida");
            }
        }else{ //muestra todo
            //comprueba si existen datos
            $data = $news->getNews("public", "desc", null);
            if($data){
                $utils->printJSON($data);
            }else{
                $utils->message("todavia no se han cargado noticias");
            }
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($userSession->checkUserPrivileges()){
        $data = $news->getNews(null, "desc", null);
        if($data){
            $utils->printJSON($data);
        }else{
            $utils->message("todavia no se han cargado noticias");
        }
    }else{
        echo "no cumples con los privilegios minimos";
    }
}

?>