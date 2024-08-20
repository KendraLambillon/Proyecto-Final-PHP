<?php

# Incluir/vincular los parametros de conexion
require_once '.env.php';

#Crear la conexion a la BBDD
$mysqli_connection = new mysqli(SERVER_HOST, USER, PASSWORD, DATABASE_NAME);

#Comprobar la conexion
if($mysqli_connection -> connect_errno){
    echo "Fallo al conectar la base de datos. Error: " . $mysqli_connection -> connect_errno;
    exit();
} else {
    echo "La conexion ha funcionado";
}
