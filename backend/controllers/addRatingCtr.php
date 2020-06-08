<?php
require_once "../database/db.php";
require_once "../models/rating.php";
require_once "../models/news.php";

$new = new News();
$rating = new Rating();

if(isset($_POST['rating_value']) && isset($_POST['new_id'])){

    $ip_address = get_client_ip();
    $rating_value = $_POST['rating_value'];
    $new_id = $_POST['new_id'];

    //Comprueba valores numericos e id noticia
    if(is_numeric($rating_value) && $rating_value >= 1 && $rating_value <= 5 && is_numeric($new_id) && $new_id > 0){

        if($new->getNew($new_id) != NULL){

            if(!$rating->UserVoted($new_id, $ip_address)){

                if($rating->addRatingValue($rating_value, $new_id, $ip_address)){
                    echo $rating->getRatingById($new_id);
                }else{
                    echo "Envio fallido";
                }
            }else{
                echo "El usuario ya voto";
            }
        }else{
            echo "No existe noticia con ese id";
        }
    }else{
        echo "Uno o mas parametros contienen valores invalidos";
    }
}else{
    echo "parametros insuficientes";
}
    // Function to get the client ip address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}
?>
