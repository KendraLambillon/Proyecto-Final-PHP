<?php
# Funciones mas utilizadas de la BBDD

# Vinculamos la ruta absoluta al directorio config.php desde db_conn.php
require_once __DIR__ . '/../config/config.php';

#Definir una funcion para comprobar si existe un usuario en la base de datos
function check_user($email, $mysqli_connection){
    try{
        #Preparar la consulta para buscar el email en la BBDD
        $select_statement = $mysqli_connection -> prepare('SELECT email FROM users_data WHERE email = ?');

        #Comprobamos si la consulta se ha podido preparar
        if($select_statement === false){
            throw new Exception("No se pudo preparar la consulta " . $mysqli_connection -> error);
        }

        #Vincular el email a la consulta
        $select_statement -> bind_param("s", $email);

        #Comprobar si se puede ejecutar la consulta
        if(!$select_statement -> execute()){
            throw new Exception("No se pudo preparar la consulta " . $select_statement -> error);
        }

        #Realizamos la ejecucion de la consulta
        $select_statement -> execute();

        #Guardamos el resultado de la consulta tras su ejecucion
        $select_statement -> store_result();

        #Comprobamos el resultado generado para saber si el email existe en la BBDD
        $result_exist = $select_statement -> num_rows > 0;

        #Cerramos la consulta
        $select_statement -> close();

        return $result_exist;

    }catch(Exception $except){
        #Añadir la excepcion al log
        error_log("Error en la funcion check_user: " . $except -> getMessage());
        return false;
    }
}