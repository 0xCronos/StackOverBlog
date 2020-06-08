<?php
//dependencias
require_once "../database/db.php";
require_once "../models/rating.php";

$rating = new Rating();

if(isset($_POST['new_id'])){
    $new_id = $_POST['new_id'];
    if(is_numeric($new_id) && $new_id > 0){
        $rating_value = $rating->getRatingById($new_id); 
        if($rating_value){
            echo $rating_value;
        }else{
            echo '0';
        }
    }else{
        echo "parametro id invalido";
    }
}else{
    echo "faltan parametros";
}
?>