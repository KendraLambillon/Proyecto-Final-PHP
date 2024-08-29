<?php
# Controlador que gestiona el registro
# Archivo necesario
require_once './config/config.php';
#Incluir el archivo de conexión
require_once 'db_connection.php';

require_once 'db_functions.php';

#Comprobar si existe una sesion activa
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

#Realizar un registro
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["registrarse"])){
    try{
        $nombre = htmlspecialchars($_POST["username"]);
        $apellidos = htmlspecialchars($_POST["surname"]);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $telefono = htmlspecialchars($_POST["phone"]);
        $fecha_nacimiento = htmlspecialchars($_POST["fnac"]);
        $direccion = htmlspecialchars($_POST["address"]);
        $genero = htmlspecialchars($_POST["gender"]);
        $nombre_usuario = htmlspecialchars($_POST["user_ref"]);
        $contrasena = htmlspecialchars($_POST["userpwd"]);

        # Hash en pwd: para encriptar la contraseña
        $password = password_hash($contrasena, PASSWORD_BCRYPT);

        #Comprobamos si el usuario existe en la BBDD
        if(check_user($email, $mysqli_connection)){
            #Establecemos un mensaje de error en la sesion
            $_SESSION['mensaje_error'] = "ERROR: el usuario ya existe en la base de datos";
            header("Location: ../views/registro.php");
            exit();
        }else{
            #Preparar la consutla para realizar la insercion de datos del nuevo usuario
            # Consulta para insertar datos en tabla users_data
            $insert_statement1 = $mysqli_connection->prepare("INSERT INTO users_data(nombre, apellidos, email, telefono, fnac, direccion, sexo) VALUES (?, ?, ?, ?, ?, ?, ?)");

            #Comprobar si se puede ejecutar la consulta
            if(!insert_statement1){
                throw new Exception("No se pudo preparar la consulta " . $mysqli_connection -> error);
            }else{
                # Especificamos que la sentencia de inserción llevará X parámetros mencionados, en este caso 7 datos
                $insert_statement1->bind_param("sssssss", $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero);
                #Se comprueba si se puede ejecutar la consulta de insercion
                if($insert_statement1 -> execute()){
                    #Cerramos la consulta
                    $insert_statement1 -> close();
                    $_SESSION['mensaje_exito'] = "EXITO: el usuario se ha registrado correctamente";
                    header("Location: ../views/registro.php");
                    exit();
                }else{
                    echo "ERROR: " . $insert_statement1 -> error;
                    $insert_statement1 -> close();
                }
            }
        }

        # Cerramos la conexión con la BD
        $mysqli_connection->close();

    }catch(){}
}
