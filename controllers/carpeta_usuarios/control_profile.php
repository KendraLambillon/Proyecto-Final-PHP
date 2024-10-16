<?php
#Vincular los archivos necesarios
require_once '../db_connection.php';
require_once '../db_functions.php';
require_once '../../config/config.php';
require_once '../validations/validate_inputData.php';

#Comprobamos si existe una sesion activa
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

#Comprobar si hemos recibido los datos para actualizar el form
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar_datos'])){
    #Recuperar los datos del form saneados
    $nombre = htmlspecialchars($_POST["username"]);
    #echo $nombre;
    $apellidos = htmlspecialchars($_POST["surname"]);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST["phone"]);
    $fecha_nacimiento = htmlspecialchars($_POST["fnac"]);
    $direccion = htmlspecialchars($_POST["address"]);
    $genero = htmlspecialchars($_POST["gender"]);
    $nombre_usuario = htmlspecialchars($_POST["user_ref"]);
    $contrasena = ($_POST["userpwd"]);

    #Recuperar el idUser del usuario de la sesion
    $id_user = $_SESSION['user_data']['userslogin_idUser'];
    echo $id_user;
    

    #Validar todos los datos
    $errores_validate = validar_registro($nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero, $nombre_usuario, $contrasena);

    #Comprobar si se han generado errores de validacion o no
    if(!empty($errores_validate)){
        #Si hay errores, vamos a guardarlos en una cadena
        $mensaje_error = "";
        #Recorremos el array de errores
        foreach($errores_validate as $clave => $mensaje){
            $mensaje_error .= $mensaje . "<br>";
        }
        #Asignamos la cadena de errores a la variable $_SESSION['mensaje_error']
        $_SESSION['mensaje_error'] = $mensaje_error;
        #Redirigimos al usuario
        header("Location: ../views/carpeta_usuarios/profile.php");
        exit();
    }

    # Hasheamos la contrasena si es correcta
    # Hash en pwd: para encriptar la contraseña
    $password = password_hash($contrasena, PASSWORD_BCRYPT);

    #Actualizacion de los datos del usuario en la BBDD
    $result = update_usuario_data($id_user, $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero, $contrasena, $mysqli_connection);

    if($result == true){
        #Actualizar los datos en la sesion
        $_SESSION['user_data']['nombre'] = $nombre;
        $_SESSION['user_data']['apellidos'] = $apellidos;
        $_SESSION['user_data']['email'] = $email;
        $_SESSION['user_data']['telefono'] = $telefono;
        $_SESSION['user_data']['fecha_nacimiento'] = $fecha_nacimiento;
        $_SESSION['user_data']['direccion'] = $direccion;
        $_SESSION['user_data']['genero'] = $genero;
        $_SESSION['user_data']['contrasena'] = $contrasena;

        $_SESSION['mensaje_exito'] = "Los datos se han actualizado correctamente";
        header('Location: ../views/carpeta_usuarios/profile.php');
        exit();
    }else{
        $_SESSION['mensaje_error'] = "Hubo un error al actualizar los datos";
        header('Location: ../views/carpeta_usuarios/profile.php');
        exit();
    }
}