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
                    <a href="../views/noticias.php" class="nav__links">Noticias</a>
                </li>
                <li class="nav__items">
                    <a href="#" class="nav__links active">Citaciones</a>
                </li>
                <li class="nav__items">
                    <a href="../views/profile.php" class="nav__links">Perfil</a>
                </li>
                <li class="nav__items">
                    <a href="../../controllers/carpeta_usuarios/logout.php" class="nav__links">Cerrar sesión</a>
                </li>
                <img src="../assets/img/close.svg" alt="close" class="nav__close">
            </ul>
            <div class="nav__menu">
                <img src="../assets/img/menu.svg" alt="menu" class="nav__img">
            </div>
        </nav>
        <section class="head__container container">
            <h1 class="head__title">Formulario de solicitud para una cita</h1>
        </section>
    </header>

    <main>
        <div class="container about">
            <h2>Solicitar cita</h2>
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
                <form id="citas" class="mi__form" action="#" method="POST">
                    <div class="form__options">
                        <label for="email">Email &#128231; </label>
                        <input type="textarea" id="email" name="email" placeholder="xxx@gmail.com" title="El email debe tener entre 10 y 60 caracteres." required>
                        <small class="input_error"></small>
                    </div>
                    <div class="form__options">
                        <label for="fecha_cita">Fecha de la cita &#128197; </label>
                        <input type="date" id="fecha_cita" name="fecha_cita" placeholder="DD/MM/YY" title="Este campo es obligatorio." required>
                        <small class="input_error"></small>
                    </div>
                    </div>
                    <div class="form__options">
                        <label for="motivo_cita">Motivo de la cita</label>
                        <textarea name="motivo_cita" id="motivo_cita" rows="5" required></textarea>
                        <small class="input_error"></small>
                    </div>
                    <div class="form__buttons">
                        <input type="reset" value="Borrar">
                        <input type="submit" value="editar" name="editar_cita">
                        <input type="submit" value="Solicitar" name="solicitar_cita">
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
                        <a href="../views/noticias.php" class="nav__links">Noticias</a>
                    </li>
                    <li class="nav__items">
                        <a href="../views/registro.php" class="nav__links">Registro</a>
                    </li>
                    <li class="nav__items">
                        <a href="../views/login.php" class="nav__links">Login</a>
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
    <script src="#"></script>
</body>
</html>