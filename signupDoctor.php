<?php

require 'database.php';

$message = '';

if (!empty($_POST['aPaterno']) && !empty($_POST['aMaterno']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO doctoresregistro (aPaterno, aMaterno, name, email, password) VALUES (:aPaterno, :aMaterno, :name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':aPaterno', $_POST['aPaterno']);
    $stmt->bindParam(':aMaterno', $_POST['aMaterno']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $pass);

    if ($stmt->execute()) {
        $message = 'Ha sido creado su usuario correctamente';
    } else {
        $message = 'Lo sentimos ha ocurrido un error creando su contraseña';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Registro doctores</title>
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

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

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

    <br><br>
    <?php if (!empty($message)) : ?>
        <script>
            Swal.fire({
                title: 'Doctor!',
                text: '<?php echo $message ?>',
                icon: 'info',
                confirmButtonText: 'Continuar'
            })
            alerta();
        </script>
    <?php endif; ?>

    <!-- REGISTRO -->
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                    <div class="col-md-4 col-sm-4">
                        <img src="images/login-image2.jpg" class="img-responsive" alt="">
                    </div>
                </div>

                <div class="col-md-8 col-sm-8">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="#">

                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Registro doctores</h2>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.8s">
                            <div class="col-md-6 col-sm-6">
                                <label for="aPaterno">Apellido paterno</label>
                                <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="Apellido paterno" required>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="aMaterno">Apellido materno</label>
                                <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="Apellido materno" required>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="name">Nombres</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre completo" required>
                                <label for="email">Correo eléctronico</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Correo" required>
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                            </div>

                            <p>** Tenga en cuenta que con los datos ingresados se registrará al doctor en el hospital</p>
                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="form-control" id="cf-submit" name="submit">Enviar registro</button>
                            </div>

                        </div>
                    </form>

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