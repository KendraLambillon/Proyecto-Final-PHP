<?php

require_once __DIR__ . '/../config/config.php';

#Iniciar sesion para acceder a las variables de sesion
session_start();

#Limpiar todas las variables de la sesion activa
$_SESSION = array();

#Si destruimos la sesion completamente, tambien borraremos las cookies de sesion
#NOTA: destruimos la sesion junto con su informacion
if(ini_get("session.use_cookies")){
    $parameters = session_get_cookie_params();

    setcookie(session_name(), '', time() - 42000,
        $parameters["path"], $parameters["domain"],
        $parameters["secure"], $parameters["httponly"]
    );
}

#Destruir la sesion
session_destroy();

#Redirigimos al usuario a la pagina principal
header("Location: ../../index.php");
exit();
