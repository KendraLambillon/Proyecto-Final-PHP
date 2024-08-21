<?php
# Controlador que gestiona el registro

#Incluir el archivo de conexion
require_once 'db_connection.php';

#Realizar un registro
if($_POST["registarse"]){
    $nombre = htmlspecialchars($_POST["username"]);
    $apellidos = htmlspecialchars($_POST["surname"]);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $telefono = $_POST["phone"];
    $fecha_nacimiento = $_POST["fnac"];
    $direccion = $_POST["address"];
    $genero = $_POST["gender"];
    $nombre_usuario = $_POST["user_ref"];
    $contrasena = htmlspecialchars($_POST["userpwd"]);

    #Hash en pwd: para encriptar la contraseña
    $password = password_hash($contrasena, PASSWORD_BCRYPT);

    #Consulta para insertar datos
    $insert_statement = $mysqli_connection -> prepare("INSERT INTO users_data(nombre, apellidos, email, telefono, fnac, direccion, sexo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    #Mensaje de error por si la consulta no funciona
    if(!$insert_statement){
        die("Error al preparar la sentencia: " . $mysqli_connection -> error);
    } else {
        $insert_statement -> bind_param("sssssss", $nombre, $apellidos, $email, $telefono, $fecha_nacimiento, $direccion, $genero);

        #Se ejecuta la consulta de insercion
        if($insert_statement -> execute()){
            $insert_statement -> close();
            header('Location: ../index.php');
            exit();
        } else {
            echo "Error: " . $insert_statement -> error;
            $insert_statement -> close();
        }

        #Cerramos la connexion con la BD
        $mysqli_connection -> close();
    }

}

/*
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
*/

/*
#Consulta para insertar datos
$insert_data = mysqli_query($mysqli_connection, "INSERT INTO users_login (usuario, usuario_password, rol) VALUES ('$nombre_usuario', '$password', 'user')");

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
*/