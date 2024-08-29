<?php
    #Este codigo funciona en caso de usar otro servidor que no sea APACHE
    ini_set('display_erros', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto PHP - Kendra Lambillon</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="./assets/img/llama_favicon.png" type="image/x-icon">
    <!--CSS-->
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="head">
        <nav class="nav container">
            <div class="nav__logo">
                <h2 class="nav__title">Trabajo Final con HTML5 - CSS3 - JS - SQL - PHP</h2>
            </div>
            <ul class="nav__link nav__link--menu">
                <li class="nav__items">
                    <a href="#" class="nav__links">Inicio</a>
                </li>
                <li class="nav__items">
                    <a href="./views/noticias.php" class="nav__links">Noticias</a>
                </li>
                <li class="nav__items">
                    <a href="./views/registro.php" class="nav__links">Registro</a>
                </li>
                <li class="nav__items">
                    <a href="./views/login.html" class="nav__links">Login</a>
                </li>
                <img src="./assets/img/close.svg" alt="close" class="nav__close">
            </ul>
            <div class="nav__menu">
                <img src="./assets/img/menu.svg" alt="menu" class="nav__img">
            </div>
        </nav>
        <section class="head__container container">
            <h1 class="head__title">Proyecto Final de PHP y SQL</h1>
            <p class="head__paragraph">Bienvenidos a mi proyecto final, donde tengo que vincular código en PHP, una base de datos y diferentes páginas que contengan vistas diferentes dependiendo del perfil de la persona, que pueden ser : visitante, usuario o administrador.</p>
            <a href="https://github.com/KendraLambillon/Proyecto-Final-PHP" target="_blank" class="cta">Trabajo final - GitHub</a>
        </section>
    </header>

    <div class="aviso_connection">
                AVISO:
                <?php
                    require_once 'controllers/db_connection.php';
                ?>
    </div>

    <main>
        <section class="container about">
            <h2 class="subtitle">Las vistas</h2>
            <p class="about__paragraph">Dependen del perfil de la persona que visita la página web.</p>
            <div class="about__main">
                <article class="about__icons">
                    <img src="./assets/img/badge.svg" alt="badge" class="about__icon">
                    <h3 class="about__title">Visitante</h3>
                    <p class="about__paragraph">Podras ver el sitio web y navegar entre las páginas.</p>
                </article>
                <article class="about__icons">
                    <img src="./assets/img/cube.svg" alt="cube" class="about__icon">
                    <h3 class="about__title">Usuario</h3>
                    <p class="about__paragraph">Podras acceder a tu espacio e interactuar con la página web.</p>
                </article>
                <article class="about__icons">
                    <img src="./assets/img/cylinder.svg" alt="cylinder" class="about__icon">
                    <h3 class="about__title">Administrador</h3>
                    <p class="about__paragraph">Tendras acceso completo al sitio web y su base de datos.</p>
                </article>
            </div>
        </section>

        <section class="knowledge">
            <div class="knowledge__container container">
                <div class="knowledge__texts">
                    <h2 class="subtitle">Historia</h2>
                    <p class="knowledge__paragraph">Así es como trabajo, con varias pantallas, mi portátil, un poco de música y cosas para picar por si me da hambre. Trabajar en un buen ambiente, es importante para la creatividad y productividad. Espero que disfrutes de tu visita a este sitio web, que formó parte de uno de mis proyectos de fin de máster profesional en desarrollo de aplicaciones multiplataforma.</p>
                </div>
                <figure class="knowledge__picture">
                    <img src="./assets/img/desk.jpg" alt="desk" class="knowledge__img">
                </figure>
            </div>
        </section>

        <section class="language container">
            <h2 class="subtitle">Descripción del Proyecto</h2>
            <h3 class="language__title">Página Web desarrollado por Kendra Lambillon con</h3>

            <div class="language__table">
                <div class="language__items">
                    <div class="language__item">
                        <p class="language__name">SQL</p>
                        <a href="#" class="discover">Descubre aquí</a>
                    </div>

                    <div class="language__item">
                        <p class="language__name">PHP</p>
                        <a href="#" class="discover">Descubre aquí</a>
                    </div>

                    <div class="language__item">
                        <p class="language__name">JavaScript</p>
                        <a href="#" class="discover">Descubre aquí</a>
                    </div>
                </div>
            </div>

        </section>

        <div class="profile">
            <div class="profile__container container">
                <img src="./assets/img/leftarrow.svg" alt="leftarrow" class="profile__arrow" id="previous">
                <section class="profile__body profile__body--show" data-id="1">
                    <div class="profile__text">
                        <h2 class="subtitle">Mi nombre es Kendra Lambillon,
                            <span class="profile__desc">estudiante en desarollo - Full Stack</span>
                        </h2>
                        <p class="profile__review">
                            Encontré una pasión para el desarollo y la tecnología. Soy fan de la automatización de tareas ya que favorece la productividad laboral.
                        </p>
                    </div>
                    <figure class="profile__picture">
                        <img src="./assets/img/Kendra_copy.png" alt="profile picture" class="profile__img">
                    </figure>
                </section>

                <section class="profile__body" data-id="2">
                    <div class="profile__text">
                        <h2 class="subtitle">Mis hobbies son,
                            <span class="profile__desc">las de una persona muy activa</span>
                        </h2>
                        <p class="profile__review">
                            Me gustan los deportes como el pole dance, las artes marciales y las acrobacias.
                            Apasionada de música, toco un poco la guitarra, el piano y el handpan.
                            También me gusta estudiar, aprender novedades y dibujar en mi tiempo libre.
                        </p>
                    </div>
                    <figure class="profile__picture">
                        <img src="./assets/img/handpan.jpg" alt="instrument picture" class="profile__img">
                    </figure>
                </section>
                <img src="./assets/img/rightarrow.svg" alt="rightarrow" class="profile__arrow" id="next">
            </div>
        </div>

        <section class="contacto container">
            <h2 class="subtitle">Contacto</h2>
            <p class="contacto__interest">¿Estas interesad@ en mi perfil? Te dejo unas opciones donde podras contactarme.</p>

            <div class="contacto__container">
                <article class="contact__item">
                    <div class="contacto__answer">
                        <h3 class="contacto__title">LinkedIn
                            <span class="contacto__arrow">
                                <img src="./assets/img/arrowup.svg" alt="arrowup" class="contacto__img">
                            </span>
                        </h3>

                        <p class="contacto__show">
                            En este enlace podras ver mis experiencias laborales y mi ruta de educación:
                            <br>
                            <br>
                            <a href="https://www.linkedin.com/in/kendra-lambillon/" target="_blank" class="discover">Perfil de Kendra LAMBILLON</a>
                        </p>
                    </div>
                </article>

                <article class="contact__item">
                    <div class="contacto__answer">
                        <h3 class="contacto__title">Email
                            <span class="contacto__arrow">
                                <img src="./assets/img/arrowup.svg" alt="arrowup" class="contacto__img">
                            </span>
                        </h3>

                        <p class="contacto__show">
                            Sigues interesad@, enviame un email. Te contestare en breve.
                            <br>
                            <br>
                            <a href="mailto:kendralambillon@gmail.com" class="discover">Escribir ahora</a>
                        </p>
                    </div>
                </article>

            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container container">
            <nav class="nav nav__footer">
                <h2 class="footer__title">
                    Proyecto final de PHP y SQL
                </h2>
                <ul class="nav__link nav__link--footer">
                    <li class="nav__items">
                        <a href="#" class="nav__links">Inicio</a>
                    </li>
                    <li class="nav__items">
                        <a href="./views/noticias.php" class="nav__links">Noticias</a>
                    </li>
                    <li class="nav__items">
                        <a href="#" class="nav__links">Registro</a>
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
                    <img src="./assets/img/LinkedIn.svg" alt="LinkedIn social" class="footer__img">
                </a>
                <a href="https://github.com/KendraLambillon" target="_blank" class="footer__icons">
                    <img src="./assets/img/github.svg" alt="GitHub social" class="footer__img">
                </a>
            </div>
            <h3 class="footer__copyright">Derechos reservados &copy; KENDRA LAMBILLON</h3>
        </section>
    </footer>

    <!--JS script-->
    <script src="./js/slider.js"></script>
    <script src="./js/menu.js"></script>
    <script src="./js/contacto.js"></script>


</body>
</html>