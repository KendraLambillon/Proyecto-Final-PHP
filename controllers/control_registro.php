<?php
# Controlador que gestiona el registro

#Incluir el archivo de conexion
require_once 'db_connection.php';

#Realizar un registro
if($_POST["registarse"]){
    $nombre = htmlspecialchars($_POST["username"]);
    $apellidos = htmlspecialchars($_POST["surname"]);
    $email = filter_input(INPUT_POST, $_POST["email"], FILTER_SANITIZE_EMAIL);
    $telefono = $_POST["phone"];
    $fecha_nacimiento = $_POST["fnac"];
    $direccion = $_POST["address"];
    $genero = $POST["gender"];
    $nombre_usuario = $_POST["user_ref"];
    $contrasena = htmlspecialchars($_POST["userpwd"]);

    #Hash en pwd: para encriptar la contraseña
    $password = password_hash($contrasena, PASSWORD_BCRYPT);
}

#Verificacion de usuario - si el usuario ya existe
$verification = mysqli_query($mysqli_connection ,"SELECT * FROM users_login WHERE usuario = '$nombre_usuario'");

$response_verfication = mysqli_num_rows($verification);

if($response_verfication > 0){
    echo '
    <script>
        alert("El nombre de usuario ya esta siendo utilizado");
        location.href = "../views/registro.php";
    </script>
    ';
    exit();
}

#Consulta para insertar datos
$insert_data = mysqli_query($mysqli_connection, "INSERT INTO users_login (usuario, usuario_password, rol) VALUES ('$nombre_usuario', '$contrasena', 'user')");

if($insert_data){
    echo '
    <script>
        alert("Registro exitoso");
        location.href = "../views/login.php";
    </script>
    ';
    exit();
}

#Cerramos la conexion
mysqli_close($mysqli_connection);
