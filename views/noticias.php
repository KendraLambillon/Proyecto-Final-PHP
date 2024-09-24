<?php
    # Comprobar si existe una sesión activa
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
                    <a href="../views/registro.php" class="nav__links">Registro</a>
                </li>
                <li class="nav__items">
                    <a href="../views/login.php" class="nav__links">Login</a>
                </li>
                <img src="../assets/img/close.svg" alt="close" class="nav__close">
            </ul>
            <div class="nav__menu">
                <img src="../assets/img/menu.svg" alt="menu" class="nav__img">
            </div>
        </nav>
        <section class="head__container container">
            <h1 class="head__title">Nuestras noticias</h1>
        </section>
    </header>

    <main>
        <div class="container about">
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


            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">Noticia title</h5>
                    <p class="card-text">Texto de la noticia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit itaque rerum ipsum iste minus, saepe a quis. Nulla voluptate modi laborum, asperiores adipisci at dolor delectus quis perspiciatis error voluptates consequatur sed fuga repellendus rem est aut ipsa! Iure non unde natus quo doloremque sit illum tempora ducimus dolore suscipit.</p>
                    <p class="card-text"><small class="text-body-secondary">Fecha publicación</small></p>
                    <p class="card-text"><small class="text-body-secondary">Nombre usuario que la ha creado</small></p>
                </div>
            </div>
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">Noticia title</h5>
                    <p class="card-text">Texto de la noticia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit itaque rerum ipsum iste minus, saepe a quis. Nulla voluptate modi laborum, asperiores adipisci at dolor delectus quis perspiciatis error voluptates consequatur sed fuga repellendus rem est aut ipsa! Iure non unde natus quo doloremque sit illum tempora ducimus dolore suscipit.</p>
                    <p class="card-text"><small class="text-body-secondary">Fecha publicación</small></p>
                    <p class="card-text"><small class="text-body-secondary">Nombre usuario que la ha creado</small></p>
                </div>
            </div>
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">Noticia title</h5>
                    <p class="card-text">Texto de la noticia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit itaque rerum ipsum iste minus, saepe a quis. Nulla voluptate modi laborum, asperiores adipisci at dolor delectus quis perspiciatis error voluptates consequatur sed fuga repellendus rem est aut ipsa! Iure non unde natus quo doloremque sit illum tempora ducimus dolore suscipit.</p>
                    <p class="card-text"><small class="text-body-secondary">Fecha publicación</small></p>
                    <p class="card-text"><small class="text-body-secondary">Nombre usuario que la ha creado</small></p>
                </div>
            </div>
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">Noticia title</h5>
                    <p class="card-text">Texto de la noticia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit itaque rerum ipsum iste minus, saepe a quis. Nulla voluptate modi laborum, asperiores adipisci at dolor delectus quis perspiciatis error voluptates consequatur sed fuga repellendus rem est aut ipsa! Iure non unde natus quo doloremque sit illum tempora ducimus dolore suscipit.</p>
                    <p class="card-text"><small class="text-body-secondary">Fecha publicación</small></p>
                    <p class="card-text"><small class="text-body-secondary">Nombre usuario que la ha creado</small></p>
                </div>
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