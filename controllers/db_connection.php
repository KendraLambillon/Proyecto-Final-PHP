<?php

# Incluir/vincular los parametros de conexion
require_once '.env.php';
require_once './config/config.php';

#Definimos una funccion para realizar la conexio a la base de datos
function connectToDatabase(){
    #Crear variable de conexion
    static $mysqli_connection = null; #Al ser estatica, se queda con el ultimo valor asignado

    if($mysqli_connection === null){
        try{
            #Crear la conexion a la BBDD
            $mysqli_connection = new mysqli(SERVER_HOST, USER, PASSWORD, DATABASE_NAME);

            #Comprobar la conexion se haya realizado correctamente
            if($mysqli_connection -> connect_errno){
                #Registrar el error en un archivo log
                error_log("Fallo al conectar la base de datos: " . $mysqli_connection -> connect_errno);
                return null;
            } else {
                echo "La conexion ha funcionado";
            }
        } catch (Exception $exep){
            #Registrar la exepcion en el archivo log
            error_log("Error de conexion a la base de datos: " . $exep -> getMessage());
            return null;
        }
    }

    return $mysqli_connection;
}

#Llamamos a la funcion
$mysqli_connection = connectToDatabase(); // los 2 posibles valores de esta variable son: $mysqli_connection o null

#Esta variable aunque sea la misma que la variable en el return de la linea 32, hay que tener en cuenta que son elementos diferentes
#Pero siempre se suele mantener el mismo nombre de la varaible return, porque es un resultado que le vamos a asociar a la variable

if($mysqli_connection === null){
    header('Location: ../views/errors/error500.html');
}



