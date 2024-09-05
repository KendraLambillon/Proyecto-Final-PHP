<?php
#Declarar como constantes las expresiones regulares que van a comprobar los datos
define("NOMBRE_REGEX", "/^[a-zA-Z ]{2,45}$/");
define("PWD_REGEX", "/^(?=.*[A-Z])(?=.*\d)(?=.*[.,_\-])[a-zA-Z\d.,_\-]{8,20}$/");

#Definimos la funcion de validar el registro
function validar_registro($nombre, $email, $password){
    #Declarar un array asociativo(clave-valor)
    $errores = [];

    #Validacion del nombre haciendo uso de la constante NOMBRE_REGEX
    if(!preg_match(NOMBRE_REGEX, $nombre)){
        $errores['nombre'] = "Nombre invalido";
    }

    #Validacion del email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores['email'] = "Email invalido";
    }

    #Validacion de la contraseña haciendo uso de la constante PWD_REGEX
    if(!preg_match(PWD_REGEX, $password)){
        $errores['pwd'] = "Contraseña invalida";
    }

    return $errores;
}

#Definimos la funcion de validar el login
function validar_login($nombre_usuario, $password){ #paso la contrasena hasheada
    #Declarar un array asociativo(clave-valor)
    $errores = [];

    #Validacion del usuario haciendo uso de la constante NOMBRE_REGEX
    if(!preg_match(NOMBRE_REGEX, $nombre_usuario)){
        $errores['usuario'] = "Usuario invalido";
    }

    #Validacion de la contraseña haciendo uso de la constante PWD_REGEX
    if(!preg_match(PWD_REGEX, $password)){
        $errores['pwd'] = "Contraseña invalida";
    }

    return $errores;
}