<?php

session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, email, password FROM doctoresregistro WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

if (isset($_SESSION['user_email'])) {
    $records = $conn->prepare('SELECT id, name, direction, telephone, email, age, ocupation, gender, civilstatus, number FROM pacientesregistro WHERE email = :email');
    $records->bindParam(':email', $_SESSION['user_email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $userPaciente = null;

    if (count($results) > 0) {
        $userPaciente = $results;
    }
}

if (isset($_SESSION['user_admin'])) {
    $records = $conn->prepare('SELECT id, name, email, password FROM adminregistro WHERE name = :name');
    $records->bindParam(':name', $_SESSION['user_admin']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $userAdmin = null;

    if (count($results) > 0) {
        $userAdmin = $results;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inicio</title>
    <!--

ORANGE CORP

INTEGRANTES:

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="AlanMora">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" sizes="256x256" href="images/favicon-256x256.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/main.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>

    <?php if (!empty($user)) : ?>

        <!-- PRE LOADER -->
        <section class="preloader">
            <div class="spinner">

                <span class="spinner-rotate"></span>

            </div>
        </section>

        <!-- HEADER -->
        <header>
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-5">
                        <p>Bienvenido a Grupo Hospitalario de México</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                        <span class="phone-icon"><i class="fa fa-phone"></i> 800 - 1200 - GHM</span>
                        <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Lun-Vie)</span>
                        <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@ghm.com</a></span>
                    </div>

                </div>
            </div>
        </header>


        <!-- MENU -->
        <section class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/ghm" class="navbar-brand"><i class="fa fa-heartbeat"></i> Grupo <i class="fa fa-h-square"></i>ospitalario de México</a>
                </div>

                <!-- MENU LINKS -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/ghm" class="smoothScroll">Inicio</a></li>
                        <li class="appointment-btn"><a href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- BOTONES -->
        <section id="appointment" data-stellar-background-ratio="3">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <!-- CONTACT FORM HERE -->
                        <form id="appointment-form" role="form" method="post" action="#">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                <h2>Bienvenido(a) <?= $user['name']; ?></h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <div class="col-md-12 col-sm-12">
                                    <a href="encuesta.php"><button type="button" class="btn btn-info btn-lg btn-block">Encuesta y registro</button></a>
                                    <br><br>
                                    <a href="agenda.php"><button type="button" class="btn btn-info btn-lg btn-block">Agenda de citas</button></a>
                                    <br><br>
                                    <a href="obtenerNumero.php"><button type="button" class="btn btn-info btn-lg btn-block">Obtener número del paciente</button></a>
                                    <br><br>
                                    <a href="darConsulta.php"><button type="button" class="btn btn-info btn-lg btn-block">Dar consulta</button></a>
                                </div>
                                
                            </div>
                        </form>
                    </div>

                    <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                        <div class="col-md-6 col-sm-6">
                            <img src="images/login-image1.jpg" class="img-responsive" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer data-stellar-background-ratio="5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 border-top">
                        <div class="col-md-4 col-sm-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2021 Orange Corp

                                    | Diseño: Alan Mora</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-link">
                                <a href="#">Politica de privacidad</a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 text-align-center">
                            <div class="angle-up-btn">
                                <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    <?php elseif (!empty($userPaciente)) : ?>

        <!-- PRE LOADER -->
        <section class="preloader">
            <div class="spinner">

                <span class="spinner-rotate"></span>

            </div>
        </section>

        <!-- HEADER -->
        <header>
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-5">
                        <p>Bienvenido a Grupo Hospitalario de México</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                        <span class="phone-icon"><i class="fa fa-phone"></i> 800 - 1200 - GHM</span>
                        <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Lun-Vie)</span>
                        <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@ghm.com</a></span>
                    </div>

                </div>
            </div>
        </header>


        <!-- MENU -->
        <section class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/ghm" class="navbar-brand"><i class="fa fa-heartbeat"></i> Grupo <i class="fa fa-h-square"></i>ospitalario de México</a>
                </div>

                <!-- MENU LINKS -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/ghm" class="smoothScroll">Inicio</a></li>
                        <li class="appointment-btn"><a href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- BOTONES -->
        <section id="appointment" data-stellar-background-ratio="3">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <!-- CONTACT FORM HERE -->
                        <form id="appointment-form" role="form" method="post" action="#">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                <h2>Bienvenido(a) <?= $userPaciente['name']; ?></h2>
                            </div>

                            <? $number = $_POST[$userPaciente['number']]; ?>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <div class="col-md-12 col-sm-12">
                                    <a href="datosPaciente.php?number=<?php echo $userPaciente['number']; ?>"><button type="button" class="btn btn-info btn-lg btn-block">Ver tus datos</button></a>
                                    <br><br>
                                    <a href="verReceta.php?number=<?php echo $userPaciente['number'] ?>"><button type="button" class="btn btn-info btn-lg btn-block">Revisar receta</button></a>
                                </div>
                                
                            </div>
                        </form>
                    </div>

                    <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                        <div class="col-md-6 col-sm-6">
                            <img src="images/login-image3.jpg" class="img-responsive" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer data-stellar-background-ratio="5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 border-top">
                        <div class="col-md-4 col-sm-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2021 Orange Corp

                                    | Diseño: Alan Mora</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-link">
                                <a href="#">Politica de privacidad</a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 text-align-center">
                            <div class="angle-up-btn">
                                <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    <?php elseif (!empty($userAdmin)) : ?>

        <!-- PRE LOADER -->
        <section class="preloader">
            <div class="spinner">

                <span class="spinner-rotate"></span>

            </div>
        </section>

        <!-- HEADER -->
        <header>
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-5">
                        <p>Bienvenido a Grupo Hospitalario de México</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                        <span class="phone-icon"><i class="fa fa-phone"></i> 800 - 1200 - GHM</span>
                        <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Lun-Vie)</span>
                        <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@ghm.com</a></span>
                    </div>

                </div>
            </div>
        </header>


        <!-- MENU -->
        <section class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/ghm" class="navbar-brand"><i class="fa fa-heartbeat"></i> Grupo <i class="fa fa-h-square"></i>ospitalario de México</a>
                </div>

                <!-- MENU LINKS -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/ghm" class="smoothScroll">Inicio</a></li>
                        <li class="appointment-btn"><a href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- BOTONES -->
        <section id="appointment" data-stellar-background-ratio="3">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <!-- CONTACT FORM HERE -->
                        <form id="appointment-form" role="form" method="post" action="#">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                <h2>Bienvenido(a) <?= $userAdmin['name']; ?></h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <div class="col-md-12 col-sm-12">
                                    <a href="verReportes.php"><button type="button" class="btn btn-info btn-lg btn-block">Ver reportes</button></a>
                                    <br><br>
                                    <a href="signupDoctor.php"><button type="button" class="btn btn-info btn-lg btn-block">Registro doctores</button></a>
                                    <br><br>
                                    <a href="encuesta.php"><button type="button" class="btn btn-info btn-lg btn-block">Encuesta</button></a>
                                </div>
                                
                            </div>
                        </form>
                    </div>

                    <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                        <div class="col-md-6 col-sm-6">
                            <img src="images/login-image2.jpg" class="img-responsive" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer data-stellar-background-ratio="5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12 border-top">
                        <div class="col-md-4 col-sm-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2021 Orange Corp

                                    | Diseño: Alan Mora</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-link">
                                <a href="#">Politica de privacidad</a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 text-align-center">
                            <div class="angle-up-btn">
                                <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    <?php else : ?>

        <!-- HEADER -->
        <header>
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-5">
                        <p>Bienvenido a Grupo Hospitalario de México</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                        <span class="phone-icon"><i class="fa fa-phone"></i> 800 - 1200 - GHM</span>
                        <span class="date-icon"><i class="fa fa-calendar-plus-o"></i> 6:00 AM - 10:00 PM (Lun-Vie)</span>
                        <span class="email-icon"><i class="fa fa-envelope-o"></i> <a href="#">info@ghm.com</a></span>
                    </div>

                </div>
            </div>
        </header>


        <!-- MENU -->
        <section class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/ghm" class="navbar-brand"><i class="fa fa-heartbeat"></i> Grupo <i class="fa fa-h-square"></i>ospitalario de México</a>
                </div>

                <!-- MENU LINKS -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#top" class="smoothScroll">Inicio</a></li>
                        <li><a href="#about" class="smoothScroll">Nosotros</a></li>
                        <li><a href="#team" class="smoothScroll">Instalaciones</a></li>
                        <li><a href="#news" class="smoothScroll">Noticias</a></li>
                        <li><a href="#google-map" class="smoothScroll">Contacto</a></li>
                        <li class="appointment-btn"><a href="#appointment">Inicia sesión</a></li>
                    </ul>
                </div>

            </div>
        </section>


        <!-- HOME -->
        <section id="home" class="slider" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">

                    <div class="owl-carousel owl-theme">
                        <div class="item item-first">
                            <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                    <h3>Te cuidas tu, nos cuidamos todos</h3>
                                    <h1>#QuedateEnCasa</h1>
                                    <a href="#team" class="section-btn btn btn-default smoothScroll">Revisa nuestras instalaciones</a>
                                </div>
                            </div>
                        </div>

                        <div class="item item-second">
                            <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                    <h3>Te atenderemos con los mejores doctores de la CDMX</h3>
                                    <h1>Y las mejores medidas sanitarias</h1>
                                    <a href="#about" class="section-btn btn btn-default smoothScroll">Nosotros</a>
                                </div>
                            </div>
                        </div>

                        <div class="item item-third">
                            <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                    <h3>¿Qué nos define?</h3>
                                    <h1>Excelencia, eficacia y amor</h1>
                                    <a href="#google-map" class="section-btn btn btn-default smoothScroll">Contáctanos</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- ABOUT -->
        <section id="about">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <div class="about-info">
                            <h2 class="wow fadeInUp" data-wow-delay="0.6s">Bienvenido a Grupo <br><i class="fa fa-h-square"></i>ospitalario de México</h2>
                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <p>En nuestro hospital, sabemos que en momentos de más vulnerabilidad, nosotros cuidamos de tu salud.</p>
                                <p>Cuidar de su salud debe ser lo más importante, la prevención, detección y tratamiento oportuno, hoy más que nunca, deben ser una prioridad.</p>
                                <p>Hemos reforzado nuestras medidas sanitarias para prevenir y evitar contagios del SARS-COV2. Siéntete seguro con nosotros.</p>
                            </div>
                            <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                <img src="images/author-image.jpg" class="img-responsive" alt="">
                                <figcaption>
                                    <h3>Dr. José Sarukhán Kermez</h3>
                                    <p>Director General</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- TEAM -->
        <section id="team" data-stellar-background-ratio="1">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <div class="about-info">
                            <h2 class="wow fadeInUp" data-wow-delay="0.1s">Nuestras instalaciones</h2>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                            <img src="images/team-image1.jpg" class="img-responsive" alt="">

                            <div class="team-info">
                                <h3>Contamos con más de</h3>
                                <p>100 camillas por hospital.</p>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <img src="images/team-image2.jpg" class="img-responsive" alt="">

                            <div class="team-info">
                                <h3>Hasta dos ambulancias</h3>
                                <p>por cada uno.</p>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.6s">
                            <img src="images/team-image3.jpg" class="img-responsive" alt="">

                            <div class="team-info">
                                <h3>Y un hospital por alcaldía</h3>
                                <p>de la CDMX</p>
                                <ul class="social-icon">
                                    <li><a href="#" class="fa fa-facebook-square"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-envelope-o"></a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- NEWS -->
        <section id="news" data-stellar-background-ratio="2.5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>Sección de noticias</h2>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <!-- NEWS THUMB -->
                        <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <a href="https://www.bbc.com/mundo/noticias-internacional-55804567">
                                <img src="images/news-image1.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                <span>Enero 28, 2021</span>
                                <h3><a href="https://www.bbc.com/mundo/noticias-internacional-55804567">Vacunas contra el coronavirus</a></h3>
                                <p>A qué se debe el secretismo que rodea los contratos entre los gobiernos y las farmacéuticas.</p>
                                <div class="author">
                                    <img src="images/author-image1.jpg" class="img-responsive" alt="">
                                    <div class="author-info">
                                        <h5>Guillermo D. Olmo</h5>
                                        <p>BBC News Mundo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <!-- NEWS THUMB -->
                        <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                            <a href="https://www.bbc.com/mundo/noticias-55842299">
                                <img src="images/news-image2.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                <span>Enero 28, 2021</span>
                                <h3><a href="https://www.bbc.com/mundo/noticias-55842299">Coronavirus:</a></h3>
                                <p>¿por qué están apareciendo ahora tantas variantes del SARS-CoV-2?</p>
                                <div class="author">
                                    <img src="images/author-image2.jpg" class="img-responsive" alt="">
                                    <div class="author-info">
                                        <h5>Ester Lázaro Lázaro</h5>
                                        <p>The Conversation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <!-- NEWS THUMB -->
                        <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                            <a href="https://www.bbc.com/mundo/noticias-55800761">
                                <img src="images/news-image3.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                <span>Enero 27, 2021</span>
                                <h3><a href="https://www.bbc.com/mundo/noticias-55800761">Insomnio por el coronavirus:</a></h3>
                                <p>el fenómeno que nos está impidiendo dormir durante la pandemia.</p>
                                <div class="author">
                                    <img src="images/author-image3.jpg" class="img-responsive" alt="">
                                    <div class="author-info">
                                        <h5>Bryan Lufkin</h5>
                                        <p>BBC Worklife</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- INICIA SESIÓN -->
        <section id="appointment" data-stellar-background-ratio="3">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <!-- CONTACT FORM HERE -->
                        <form id="appointment-form" role="form" method="post" action="#">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                <h2>Selecciona tu rol</h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <div class="col-md-12 col-sm-12">
                                    <a href="login.php"><button type="button" class="btn btn-info btn-lg btn-block">Doctor</button></a>
                                    <br><br>
                                    <a href="loginPaciente.php"><button type="button" class="btn btn-info btn-lg btn-block">Paciente</button></a>
                                    <br><br>
                                    <a href="loginAdmin.php"><button type="button" class="btn btn-info btn-lg btn-block">Administrador</button></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>


        <!-- GOOGLE MAP -->
        <section id="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.9506578569653!2d-99.15307064895809!3d19.414537786830174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff213273db0b%3A0x6890419a49bbce97!2sHospital%20General%20de%20M%C3%A9xico%20%22%20Dr.%20Eduardo%20Liceaga%20%22!5e0!3m2!1ses-419!2smx!4v1611888176461!5m2!1ses-419!2smx" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>


        <!-- FOOTER -->
        <footer data-stellar-background-ratio="5">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <div class="footer-thumb">
                            <h4 class="wow fadeInUp" data-wow-delay="0.4s">Información de contacto</h4>
                            <p>Cualquier consulta o aclaración, no dude en contactarnos.</p>

                            <div class="contact-info">
                                <p><i class="fa fa-phone"></i> 800 - 1200 - GHM</p>
                                <p><i class="fa fa-envelope-o"></i> <a href="#">info@ghm.com</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="footer-thumb">
                            <div class="opening-hours">
                                <h4 class="wow fadeInUp" data-wow-delay="0.4s">Horarios</h4>
                                <p>Lunes - Viernes <span>06:00 AM - 10:00 PM</span></p>
                                <p>Sabado <span>09:00 AM - 08:00 PM</span></p>
                                <p>Domingo <span>Cerrado</span></p>
                            </div>

                            <ul class="social-icon">
                                <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                        <div class="col-md-4 col-sm-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2021 Orange Corp

                                    | Diseño: Alan Mora</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-link">
                                <a href="#">Politica de privacidad</a>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 text-align-center">
                            <div class="angle-up-btn">
                                <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

    <?php endif; ?>

    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>