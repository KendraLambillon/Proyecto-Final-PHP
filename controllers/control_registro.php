<?php
# Controlador que gestiona el registro

#Incluir el archivo de conexión
require_once 'db_connection.php';

#Realizar un registro
if ($_POST["registrarse"]) {
    $nombre = htmlspecialchars($_POST["username"]);
    $apellidos = htmlspecialchars($_POST["surname"]);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $telefono = $_POST["phone"];
    $fecha_nacimiento = $_POST["fnac"];
    $direccion = $_POST["address"];
    $genero = $_POST["gender"];
    $nombre_usuario = $_POST["user_ref"];
    $contrasena = htmlspecialchars($_POST["userpwd"]);

    # Hash en pwd: para encriptar la contraseña
    $password = password_hash($contrasena, PASSWORD_BCRYPT);

    # Consulta para insertar datos en tabla users_data
    $insert_statement1 = $mysqli_connection->prepare("INSERT INTO users_data(nombre, apellidos, email, telefono, fnac, direccion, sexo) VALUES (?, ?, ?, ?, ?, ?, ?)");

    # Mensaje de error por si la consulta no funciona
    if (!$insert_statement1) {
        die("Error al preparar la sentencia: " . $mysqli_connection->error);
    } else {
        # Especificamos que la sentencia de inserción llevará X parámetros mencionados, en este caso 7 datos
        $insert_statement1->bind_param("sssssss", $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero);

        # Ejecutar la consulta de inserción
        if ($insert_statement1->execute()) {
            # Obtener el idUser generado automáticamente
            $iduser = $mysqli_connection->insert_id;

            # Consulta para insertar datos en tabla users_login
            $insert_statement2 = $mysqli_connection->prepare("INSERT INTO users_login(userslogin_idUser, usuario, usuario_password, rol) VALUES (?, ?, ?, 'user')");

            if (!$insert_statement2) {
                die("Error al preparar la sentencia: " . $mysqli_connection->error);
            } else {
                $insert_statement2->bind_param("iss", $iduser, $nombre_usuario, $password);

                # Ejecutar la consulta de inserción en users_login
                if ($insert_statement2->execute()) {
                    $insert_statement1->close();
                    $insert_statement2->close();
                    header('Location: ../index.php');
                    exit();
                } else {
                    echo "Error al insertar en users_login: " . $insert_statement2->error;
                    $insert_statement2->close();
                }
            }
        } else {
            echo "Error al insertar en users_data: " . $insert_statement1->error;
        }

        # Cerramos la conexión con la BD
        $mysqli_connection->close();
    }
}