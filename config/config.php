<?php
    #Este codigo funciona en caso de usar otro servidor que no sea APACHE
    ini_set('display_erros', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    #Archivo de configuracion de avisos de errores
    #No queremos que este archivo sea accesible desde el navegador de usuario, por lo tanto, vamos a crear un archivo htaccess en la carpeta config