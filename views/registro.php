<?php
    #Comprobar si existe una sesion activa
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto PHP - Kendra Lambillon</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="../assets/img/llama_favicon.png" type="image/x-icon">
    <!--CSS-->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="head">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">Trabajo Final con HTML5 - CSS3 - JS - SQL - PHP</h2>
            </div>
            <ul class="nav__link nav__link--menu">
                <li class="nav__items">
                    <a href="../index.php" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links">Noticias</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links">Registro</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links">Login</a>
                </li>
                <img src="../assets/img/close.svg" alt="close" class="nav__close">
            </ul>
            <div class="nav__menu">
                <img src="../assets/img/menu.svg" alt="menu" class="nav__img">
            </div>
        </nav>
        <section class="head__container container">
            <h1 class="head__title">Formulario de registro</h1>
        </section>
    </header>

    <main>
        <div class="container about">
            <h2>Registrarse</h2>
            <div class="aviso__registro">
                <?php
                    #Comprobar si hay mensajes de error
                    if(isset($_SESSION["mensaje_error"])){
                        echo "<span>" . $_SESSION['mensaje_error'] . "</span>";
                        #Eliminar el mensaje de error
                        unset($_SESSION["mensaje_error"]);
                    }

                    #Comprobar si hay mensajes de exito
                    if(isset($_SESSION["mensaje_exito"])){
                        echo "<span>" . $_SESSION['mensaje_exito'] . "</span>";
                        #Eliminar el mensaje de exito
                        unset($_SESSION["mensaje_exito"]);
                    }
                ?>
            </div>
            <div class="formulario">
                <form id="regsitro" class="mi__form" action="../controllers/control_registro.php" method="POST">
                    <div class="form__options">
                        <label for="username">Nombre &#128113; </label>
                        <input type="text" id="username" name="username" placeholder="Escriba su nombre">
                    </div>
                    <div class="form__options">
                        <label for="surname">Apellidos &#128113; </label>
                        <input type="text" id="surname" name="surname" placeholder="Escriba su appellido">
                    </div>
                    <div class="form__options">
                        <label for="email">Email &#128231; </label>
                        <input type="textarea" id="email" name="email" placeholder="Escriba su correo electronico">
                    </div>
                    <div class="form__options">
                        <label for="phone">Teléfono &#128222; </label>
                        <input type="tel" id="phone" name="phone" placeholder="Escriba su telefono">
                    </div>
                    <div class="form__options">
                        <label for="fnac">Fecha de nacimiento &#128197; </label>
                        <input type="date" id="fnac" name="fnac" placeholder="Escriba su fecha de nacimiento">
                    </div>
                    <div class="form__options">
                        <label for="address">Dirección &#128205; </label>
                        <input type="text" id="address" name="address" placeholder="Escriba su dirección">
                    </div>
                    <div class="form__options">
                        <label for="gender">Género &#128699; </label>
                        <input type="text" id="gender" name="gender" placeholder="Mujer, Hombre, Neutro">
                    </div>
                    <div class="form__options">
                        <label for="user_ref">Nombre de usuario &#128187; </label>
                        <input type="text" id="user_ref" name="user_ref" placeholder="Escriba su nombre de usuario">
                    </div>
                    <div class="form__options">
                        <label for="userpwd">Contraseña &#128272; </label>
                        <input type="password" id="userpwd" name="userpwd" placeholder="Escriba su contraseña">
                    </div>
                    <div class="password__show">
                        <label for="checkpwd">Mostrar contraseña</label>
                        <input type="checkbox" id="checkpwd">
                    </div>
                    <div class="form__buttons">
                        <input type="reset" value="Borrar">
                        <input type="submit" value="Enviar" name="registrarse">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer__container container">
            <nav class="nav nav__footer">
                <h2 class="footer__title">
                    Proyecto final de PHP y SQL
                </h2>
                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="../index.php" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Noticias</a>
                    </li>
                    <li class="nav__items">
                        <a href="../views/registro.html" class="nav__links">Registro</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Login</a>
                    </li>
                </ul>
            </nav>
        </div>

        <section class="footer__copy container">
            <div class="footer__social">
                <a href="https://www.linkedin.com/in/kendra-lambillon/" target="_blank" class="footer__icons">
                    <img src="../assets/img/LinkedIn.svg" alt="LinkedIn social" class="footer__img">
                </a>
                <a href="https://github.com/KendraLambillon" target="_blank" class="footer__icons">
                    <img src="../assets/img/github.svg" alt="GitHub social" class="footer__img">
                </a>
            </div>
            <h3 class="footer__copyright">Derechos reservados &copy; KENDRA LAMBILLON</h3>
        </section>
    </footer>

    <!--JS script-->
    <script src="../js/registro.js"></script>
</body>
</html>