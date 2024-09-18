<?php
#Declarar como constantes las expresiones regulares que van a comprobar los datos
define("NOMBRE_REGEX", "/^[a-zA-Z ]{2,45}$/");
define("SURNAME_REGEX", "/^[a-zA-Z ]{2,45}$/");
define("TELEFONO_REGEX", "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{9,20}$/");
define("FNAC_REGEX", "/(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/");
define("ADDRESS_REGEX", "/^(\d{1,}) [a-zA-Z0-9\s]+(\,)? [a-zA-Z]+(\,)? [A-Z]{2} [0-9]{5,6}$/");
define("GENDER_REGEX", "/^[a-zA-Z ]{4,6}$/");
define("NOMBREUSUARIO_REGEX", "/^[A-Za-z][A-Za-z0-9_]{4,45}$/");
define("PWD_REGEX", "/^(?=.*[A-Z])(?=.*\d)(?=.*[.,_\-])[a-zA-Z\d.,_\-]{8,20}$/");

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