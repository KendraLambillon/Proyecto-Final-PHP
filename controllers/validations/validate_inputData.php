<?php
#Declarar como constantes las expresiones regulares que van a comprobar los datos
define("NOMBRE_REGEX", "/^[a-zA-Z ]{2,45}$/");
define("SURNAME_REGEX", "/^[a-zA-Z ]{2,45}$/");
define("TELEFONO_REGEX", "/^\d{9}$/");
define("FNAC_REGEX", "/^(0[1-9]|[12][0-9]|3[01])[-\/](0[1-9]|1[0-2])[-\/](19|20)\d{2}$/");
define("ADDRESS_REGEX", "/^[a-zA-Z0-9\s,.#-]{5,100}$/");
define("GENDER_REGEX", "/^(Mujer|Hombre|Neutro)$/");
define("NOMBREUSUARIO_REGEX", "/^[A-Za-z][A-Za-z0-9_]{4,45}$/");
define("PWD_REGEX", "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_.])[a-zA-Z0-9._-]{4,20}$/");

#Definimos la funcion de validar el registro
function validar_registro($nombre, $apellidos, $email, $telefono,  $fecha_nacimiento, $direccion, $genero, $nombre_usuario, $password){
    #Declarar un array asociativo(clave-valor)
    $errores = [];

    #Validacion del nombre haciendo uso de la constante NOMBRE_REGEX
    if(!preg_match(NOMBRE_REGEX, $nombre)){
        $errores['nombre'] = "Nombre invalido";
    }

    #Validacion del surname haciendo uso de la constante SURNAME_REGEX
    if(!preg_match(SURNAME_REGEX, $apellidos)){
        $errores['apellidos'] = "Apellidos invalido";
    }

    #Validacion del email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores['email'] = "Email invalido";
    }

    #Validacion del telefono haciendo uso de la constante TELEFONO_REGEX
    if(!preg_match(TELEFONO_REGEX, $telefono)){
        $errores['telefono'] = "Teléfono invalido";
    }

    #Validacion de la fecha de nacimiento haciendo uso de la constante FNAC_REGEX
    if(!preg_match(FNAC_REGEX, $fecha_nacimiento)){
        $errores['fnac'] = "Fecha nacimiento invalida";
    }

    #Validacion de la direccion haciendo uso de la constante ADDRESS_REGEX
    if(!preg_match(ADDRESS_REGEX, $direccion)){
        $errores['address'] = "Dirección invalida";
    }

    #Validacion del sexo haciendo uso de la constante GENDER_REGEX
    if(!preg_match(GENDER_REGEX, $genero)){
        $errores['gender'] = "Genero invalido";
    }

    #Validacion del nombre de usuario haciendo uso de la constante NOMBREUSUARIO_REGEX
    if(!preg_match(NOMBREUSUARIO_REGEX, $nombre_usuario)){
        $errores['nombreusuario'] = "Nombre usuario invalido";
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