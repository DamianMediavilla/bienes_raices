<?php
function conectarDB(){
    $db = mysqli_connect('localhost', 'root', 'root', 'bienes_raices');
    if(!$db){
        echo "Imposible conectar base de datos";
        exit;
    }
    return $db;
}