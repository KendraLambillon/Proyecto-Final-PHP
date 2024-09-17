<?php
# Controlador que gestiona el registro
# Archivo necesario
require_once __DIR__ . '/../config/config.php';
#Incluir el archivo de conexión
require_once 'db_connection.php';
#Incluir el archivo de funcciones
require_once 'db_functions.php';
#Incluir un directorio absoluto al fichero validate
require_once __DIR__ . '/validations/validate_inputData.php';

#Comprobar si existe una sesion activa
if(session_status() == PHP_SESSION_NONE){
    session_start();
}


#Comprobaoms si la informacion llega a traves del metodo post y del formulario con submit
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["registrarse"])){
    #Obtenemos los datos del formulario saneados
    $nombre = htmlspecialchars($_POST["username"]);
    $apellidos = htmlspecialchars($_POST["surname"]);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars($_POST["phone"]);
    $fecha_nacimiento = htmlspecialchars($_POST["fnac"]);
    $direccion = htmlspecialchars($_POST["address"]);
    $genero = htmlspecialchars($_POST["gender"]);
    $nombre_usuario = htmlspecialchars($_POST["user_ref"]);
    $contrasena = htmlspecialchars($_POST["userpwd"]);


    #Validar el formulario a traves de la function validar_registro
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
        header("Location: ../views/registro.php");
        exit();
    }

    # Hasheamos la contrasena si es correcta
    # Hash en pwd: para encriptar la contraseña
    $password = password_hash($contrasena, PASSWORD_BCRYPT);

    #Realizar un registro
    try{
        #Declaramos una variable que registrara si se ha producido una excepcion
        $exception_error = false;

        #Comprobamos si el usuario existe en la BBDD
        if(check_user($email, $mysqli_connection, $exception_error)){
            #Establecemos un mensaje de error en la sesion
            $_SESSION['mensaje_error'] = "ERROR: el usuario ya existe en la base de datos";
            header("Location: ../views/registro.php");
            exit();
        }else{
            #Si se a producido una excepcion durante la comprobacion
            if($exception_error == true){
                header('Location: ../views/errors/error500.html');
                exit();
            } else{
                #Si el usuario no existe
                #Preparar la consutla para realizar la insercion de datos del nuevo usuario
                # Consulta para insertar datos en tabla users_data
                $insert_statement1 = $mysqli_connection -> prepare("INSERT INTO users_data(nombre, apellidos, email, telefono, fnac, direccion, sexo) VALUES (?, ?, ?, ?, ?, ?, ?)");

                #Comprobar si se puede ejecutar la consulta
                if(!$insert_statement1){
                    error_log("No se pudo preparar la consulta " . $mysqli_connection -> error);
                    header('Location: ../views/errors/error500.html');
                }else{
                    # Especificamos que la sentencia de inserción llevará X parámetros mencionados, en este caso 7 datos
                    $insert_statement1 -> bind_param("sssssss", $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero);
                    #Se comprueba si se puede ejecutar la consulta1 de insercion
                    if($insert_statement1 -> execute()){
                        # Obtener el idUser generado automáticamente
                        $iduser = $mysqli_connection -> insert_id;

                        # Consulta para insertar datos en tabla users_login
                        $insert_statement2 = $mysqli_connection -> prepare("INSERT INTO users_login(userslogin_idUser, usuario, usuario_password, rol) VALUES (?, ?, ?, 'user')");

                        #Comprobar si se puede ejecutar la consulta2
                        if(!$insert_statement2){
                            error_log("No se pudo preparar la consulta " . $mysqli_connection -> error);
                            header('Location: ../views/errors/error500.html');
                        }else{
                            # Especificamos que la sentencia de inserción llevará X parámetros mencionados, 3 datos
                            $insert_statement2 -> bind_param("iss", $iduser, $nombre_usuario, $password);

                            if($insert_statement2 -> execute()){
                                $insert_statement1 -> close();
                                $insert_statement2 -> close();
                                $_SESSION['mensaje_exito'] = "EXITO: el usuario se ha registrado correctamente";
                                header("Location: ../views/login.php");
                                exit();
                            }
                        }

                    }else{
                        #Se guarda el error de ejecucion en el error_log
                        error_log("Error: " . $insert_statement1 -> error);
                        error_log("Error: " . $insert_statement2 -> error);
                        header("Location: ../views/registro.php");
                        exit();
                    }
                }
            }
        }

    }catch(Exception $e){
        #Registramos la excepcion en el error_log
        error_log("Error en control_registro.php" . $e -> getMessage());
        header('Location: ../views/errors/error500.html');
    # Independientemente de si se genera una excepción o no al final siempre se realizará el siguiente código
    } finally {
        # Cerramos las consultas si aún siguen abiertas
        if(isset($insert_statement1) && ($insert_statement1)){
            $insert_statement1 -> close();
        }

        if(isset($insert_statement2) && ($insert_statement2)){
            $insert_statement2 -> close();
        }

        # Cerramos la conexión a la base de datos si aún sigue abierta
        if(isset($mysqli_connection) && ($mysqli_connection)){
            $mysqli_connection -> close();
        }

    }
}
