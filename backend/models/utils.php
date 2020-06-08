<?php
class Utils{

    //Transforma arreglo a json y lo muestra
    public function printJSON($array){
        echo json_encode($array);
    }

    //Muestra mensaje en formato json
    public function message($message){
        echo json_encode(array('mensaje' => $message));
    }
}
?>