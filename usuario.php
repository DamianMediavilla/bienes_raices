<?php
//importar conexion
require 'includes/config/database.php';
$db = conectarDB();

//crear mail y pass
$email = "correo@corre0.com";
$password = "123456";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//query para crear usuario
$query = " INSERT INTO usuarios ( email, password) VALUES ( '$email', '$passwordHash' ) ";

echo $query;

echo mysqli_query($db, $query);
//agregar a db
echo "wtf";