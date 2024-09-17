<?php
# Controlador que gestiona el Login
#Vincular los archivos necesarios
require_once 'db_connection.php';
require_once 'db_functions.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/validations/validate_inputData.php';

#Comprobar si hay una session activa
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

#Comprobar si la informacion esta llegando a traves de POST y Submit
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_login'])){
    #Obtener los datos del formulario saneados
    $nombre = htmlspecialchars($_POST["username"]);
    $apellidos = htmlspecialchars($_POST["surname"]);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST["phone"]);
    $fecha_nacimiento = htmlspecialchars($_POST["fnac"]);
    $direccion = htmlspecialchars($_POST["address"]);
    $genero = htmlspecialchars($_POST["gender"]);
    $nombre_usuario = htmlspecialchars($_POST["user_ref"]);
    $contrasena = htmlspecialchars($_POST["userpwd"]);

    #Recuperar el idUser del usuario de la sesion
    $id_user = $_SESSION['user_data']['userslogin_idUser'];
    echo $id_user;

    
    #Validar el formulario
    $errores_validate = validar_login($nombre_usuario, $contrasena);

    #Comprobar si se han generado errores de validacion
    if(!empty($errores_validate)){
        #Si hay errores los guardamos en una cadena de caracteres
        $mensaje_error = "";

        foreach($errores_validate as $clave => $mensaje){
            $mensaje_error .= $mensaje . "<br>";
        }

        #Asignamos la cadena de caracteres con los errores a $_SESSION['mensaje_error']
        $_SESSION['mensaje_error'] = $mensaje_error;
        header("Location: ../views/login.php");
        exit();
    }

    #Intentamos comprobar el inicio de sesion
    try{
        #Inicializamos una variable para guardar los errores de excepcion posibles
        $exception_error = false;

        $user = get_user_by_usuario($nombre_usuario, $mysqli_connection, $exception_error);

        $user_other_data = get_other_data($id_user, $nombre, $mysqli_connection, $exception_error);

        #Comprobar si se ha capturado alguna excepcion
        if($exception_error){
            #Redirigimos a la pagina de error
            $_SESSION['mensaje_error'] = "Error al buscar el usuario. Intentelo mas tarde o contacte con el Administrador.";
            header("Location: ../views/errors/error500.html");
            exit();
        }

        #Comprobar si hemos encontrado al usuario
        if($user){
            #Verificar si la contraseña facilitada por el usuario en el form si coincide con la de la BBDD
            if(password_verify($contrasena, $user['usuario_password'])){
                #Generar una variable de sesion para guardar los datos
                $_SESSION['user_data'] = $user;

                #Establecer una variable de sesion con el resto de los datos para guardarlos
                $_SESSION['user_other_data'] = $user_other_data;
                /*
                If($user_other_data !== false){
                    $_SESSION['user_other_data'] = $user_other_data;
                }else{
                    $_SESSION['user_other_data'] = $user_other_data;
                }
                */


                header('Location: ../views/carpeta_usuarios/profile.php');
                exit();
            }else{
                #Si la contraseña no coincide
                $_SESSION['mensaje_error'] = "La contraseña no es correcta";
                header("Location: ../views/login.php");
                exit();
            }

        }else{
            #Si no existe el usuario o no se encuentra
            $_SESSION['mensaje_error'] = "No se ha encontrado el usuario";
            header("Location: ../views/login.php");
            exit();
        }
    }catch(Exception $e){
        error_log("Error durante el proceso de inicio de sesion: " . $e -> getMessage());
        header("Location: ../views/errors/error500.html");
        exit();
    }finally{
        #Cerramos la conexion a la BBDD si aun sigue abierta
        #si esta estableida la conexion y si existe:
        if(isset($mysqli_connection) && ($mysqli_connection)){
            $mysqli_connection -> close();
        }
    }
}