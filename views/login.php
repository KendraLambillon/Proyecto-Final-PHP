<?php
    # Comprobar si existe una sesión activa
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
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
                    <a href="../views/noticias.php" class="nav__links">Noticias</a>
                </li>
                <li class="nav__items">
                    <a href="../views/registro.php" class="nav__links ">Registro</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links active">Login</a>
                </li>
                <img src="../assets/img/close.svg" alt="close" class="nav__close">
            </ul>
            <div class="nav__menu">
                <img src="../assets/img/menu.svg" alt="menu" class="nav__img">
            </div>
        </nav>
        <section class="head__container container">
            <h1 class="head__title">Inicio de sesión</h1>
        </section>
    </header>
    <!-- Cuerpo Principal  -->
    <main>
        <div class="container about">
            <h2>Iniciar sesión</h2>
            <div class="aviso_registro">
            </div>
            <!-- Form -->
            <div class="formulario">
                <form id="login_form" class="mi__form" action="http://localhost/ProyectoFinal_PHP/controllers/control_login.php" method="POST">
                    <div class="form__options">
                        <label for="user_ref">Nombre de usuario &#128187; </label>
                        <input type="text" id="user_ref" name="user_ref" placeholder="Nombre de usuario" title="El nombre de usuario debe ser único y tener entre 4 y 45 caracteres." required>
                        <small class="input_error"></small>
                    </div>
                    <div class="form__options">
                        <label for="userpwd">Contraseña &#128272; </label>
                        <input type="password" id="userpwd" name="userpwd" placeholder="Contraseña" title="La contraseña deberá contener entre 8 y 20 caracteres e incluir de forma obligatoria una letra mayúscula, un número y un símbolo entre los siguientes (.,_-)" required>
                        <small class="input_error"></small>
                    </div>
                    <div class="password__show">
                        <label for="checkpwd">Mostrar contraseña</label>
                        <input type="checkbox" id="checkpwd">
                    </div>
                    <div class="form__buttons">
                        <input type="reset" value="Borrar">
                        <input type="submit" value="Enviar" name="start_login">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <section class="footer__container container">
            <nav class="nav nav__footer">
                <h2 class="footer__title">
                    Proyecto final de PHP y SQL
                </h2>
                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="../index.php" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="../views/noticias.php" class="nav__links">Noticias</a>
                    </li>
                    <li class="nav__items">
                        <a href="../views/registro.php" class="nav__links">Registro</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links active">Login</a>
                    </li>
                </ul>
            </nav>
        </section>

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
    <script src="../js/login.js"></script>

</body>
</html>