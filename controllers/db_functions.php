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

#Definir una funcion para obtener los datos del usuario a traves del login
function get_user_by_usuario($nombre_usuario, $mysqli_connection, &$exception_error){
    #Inicializar la consulta
    $select_statement = null;

    try{
        #Preparar la consulta SQL necesaria para buscar al usuario a traves de su nombre de usuario
        $query = "SELECT * FROM users_login WHERE usuario = ? LIMIT 1";
        $select_statement = $mysqli_connection -> prepare($query);

        if($select_statement === false){
            error_log("No se pudo preparar la consulta " . $mysqli_connection -> error);
            $exception_error = true;
            return false; #Salimos de la funcion
        }

        #Vincular el nombre_usuario a la consulta
        $select_statement -> bind_param('s', $nombre_usuario);

        #Intentar ejecutar la consulta
        if(!$select_statement -> execute()){
            error_log("No se puede ejecutar la consulta " . $mysqli_connection -> error);
            $exception_error = true;
            return false;
        }

        #Obtener el resultado de la consulta
        $result = $select_statement -> get_result();

        if($result -> num_rows > 0){
            $user = $result -> fetch_assoc(); #fetch_assoc() nos permite tener los datos del resultado como array asociativo
            return $user;
        }else{
            #Si no se encuentra el usuario o no existe
            return false;
        }


    }catch(Exception $e){
        error_log("Error al ejecutar la funcion get_user_by_usuario(): " . $e -> getMessage());
        $exception_error = true;
        return false;
    }finally{
        #Aseguramos de cerrar la consulta si existe
        if($select_statement !== null){
            $select_statement -> close();
        }
    }
}

#Funcion para obtener los otros datos ubicado en el registro y hacer el autocompletado en profile.php

function get_other_data($id_user, $nombre, $mysqli_connection, &$exception_error){
    #Inicializar la consulta
    $select_statement = null;

    try{
        #Preparar la consulta SQL necesaria para buscar al usuario a traves de su nombre
        $query = "SELECT * FROM users_data WHERE nombre = 'username' ";
        $select_statement = $mysqli_connection -> prepare($query);

        if($select_statement === false){
            error_log("No se pudo preparar la consulta " . $mysqli_connection -> error);
            $exception_error = true;
            return false; #Salimos de la funcion
        }

        #Vincular el nombre a la consulta
        $select_statement -> bind_param('s', $nombre);

        #Intentar ejecutar la consulta
        if(!$select_statement -> execute()){
            error_log("No se puede ejecutar la consulta " . $mysqli_connection -> error);
            $exception_error = true;
            return false;
        }

        #Obtener el resultado de la consulta
        $result = $select_statement -> get_result();

        if($result -> num_rows > 0){
            $user_other_data = $result -> fetch_assoc(); #fetch_assoc() nos permite tener los datos del resultado como array asociativo
            return $user_other_data;
        }else{
            #Si no se encuentra el usuario o no existe
            return false;
        }


    }catch(Exception $e){
        error_log("Error al ejecutar la funcion get_other_data(): " . $e -> getMessage());
        $exception_error = true;
        return false;
    }finally{
        #Aseguramos de cerrar la consulta si existe
        if($select_statement !== null){
            $select_statement -> close();
        }
    }
}




#Funcion que permite actualizar un usuario
function update_usuario_data($id_user, $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero, $contrasena, $mysqli_connection){
    #Evitar inyecciones SQL
    $nombre = $mysqli_connection -> real_escape_string($nombre);
    $apellidos = $mysqli_connection -> real_escape_string($apellidos);
    $email = $mysqli_connection -> real_escape_string($email);
    $telefono = $mysqli_connection -> real_escape_string($telefono);
    $fecha_nacimiento = $mysqli_connection -> real_escape_string($fecha_nacimiento);
    $direccion = $mysqli_connection -> real_escape_string($direccion);
    $genero = $mysqli_connection -> real_escape_string($genero);
    $contrasena = $mysqli_connection -> real_escape_string($contrasena);


    #Crear consulta de actualizacion
    $query = "UPDATE users_data SET nombre = ?, apellidos = ?, email = ?, telefono = ?, fecha_nacimiento = ?, direccion = ?, genero = ?, contrasena = ? WHERE id_user = ?";

    #Preparar la consulta SQL
    $consulta = $mysqli_connection -> prepare($query);

    #Vincular los parametros
    $consulta -> bind_param('sssssssss', $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero, $contrasena, $id_user);

    #Ejecutar la consulta de actualizacion
    $result = $consulta -> execute();

    #Comprobar si la actualizacion se ha realizado correctamente
    if($result){
        return true;
    }else{
        return false;
    }
}