<?php
# Controlador que gestiona el registro

#Incluir el archivo de conexion
require_once 'db_connection.php';

#Realizar un registro
if($_POST["registarse"]){
    $nombre = htmlspecialchars($_POST["username"]);
    $email = filter_input(INPUT_POST, $_POST["email"], FILTER_SANITIZE_EMAIL);
    $pwd = htmlspecialchars($_POST["userpwd"]);

    #Hash en pwd: para encriptar la contraseña
    $password = password_hash($pwd, PASSWORD_BCRYPT);
}
