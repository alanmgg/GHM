<?php

require 'database.php';

$message = '';

if (isset($_POST['submit'])) {
    $number = $_REQUEST['number'];
    if (!empty($_POST['number'])) {

        $query = "SELECT aPaterno, aMaterno, name, number FROM pacientesregistro WHERE number = $number";
        if ($receta = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)) {

            foreach ($receta as $datos);

            $message = 'Usuario encontrado.';
        } else {
            $message = 'Usuario no encontrado.';
        }
    }
} else if (isset($_POST['submit2'])) {
    $number = $_REQUEST['numberseg'];
    $receta = $_REQUEST['receta'];

    $texto = (string) $receta;

    $query = "SELECT aPaterno, aMaterno, name FROM pacientesregistro WHERE number = $number";
    if ($receta = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)) {

        foreach ($receta as $datos);

        $sql = "UPDATE `receta` SET text='$texto' WHERE number = $number";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute()) {
            $message = 'Receta registrada con exito.';
        } else {
            $message = 'Receta no registrada. Ocurrio un error.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Consulta</title>
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

                <!-- LOGO TEXT HERE -->
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

    <!-- TUS DATOS -->
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                    <div class="col-md-4 col-sm-4">
                        <img src="images/login-image1.jpg" class="img-responsive" alt="">
                    </div>
                </div>

                <?php if (isset($_POST['submit'])) : ?>
                    <div class="col-md-8 col-sm-8">
                        <!-- CONTACT FORM HERE -->
                        <form id="appointment-form" role="form" method="post" action="darConsulta.php">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                <h2>Consulta</h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" id="number" name="number" placeholder="Ingresa número del paciente">
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="form-control" id="cf-submit" name="submit">Realizar otra busqueda</button>
                                </div>


                                <div class="col-md-12 col-sm-12">
                                    <label for="aPaterno">Apellido paterno</label>
                                    <input type="text" class="form-control" id="aPaterno" name="aPaterno" value="<?php if ($receta = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)) {
                                                                                                                        echo $datos['aPaterno'];
                                                                                                                    } ?>" placeholder="" readonly>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="aMaterno">Apellido materno</label>
                                    <input type="text" class="form-control" id="aMaterno" name="aMaterno" value="<?php if ($receta = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)) {
                                                                                                                        echo $datos['aMaterno'];
                                                                                                                    } ?>" placeholder="" readonly>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="name">Nombres</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php if ($receta = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)) {
                                                                                                                echo $datos['name'];
                                                                                                            } ?>" placeholder="" readonly>
                                    <label for="number">Número de seguro</label>
                                    <input type="number" class="form-control" id="numberseg" name="numberseg" value="<?php if ($receta = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC)) {
                                                                                                                            echo $number;
                                                                                                                        } ?>" placeholder="" readonly>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="direction">Receta</label>
                                    <textarea name="receta" class="form-control" placeholder="Escribe la receta"></textarea>
                                    <button type="submit" class="form-control" id="cf-submit" name="submit2">Registrar receta</button>
                                </div>

                            </div>
                        </form>

                    </div>

                <?php else : ?>
                    <div class="col-md-8 col-sm-8">
                        <!-- CONTACT FORM HERE -->
                        <form id="appointment-form" role="form" method="post" action="darConsulta.php">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                <h2>Consulta</h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" class="form-control" id="number" name="number" placeholder="Ingresa número del paciente" required>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <button type="submit" class="form-control" id="cf-submit" name="submit">Buscar paciente</button>
                                </div>


                                <div class="col-md-12 col-sm-12">
                                    <label for="aPaterno">Apellido paterno</label>
                                    <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="" readonly>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="aMaterno">Apellido materno</label>
                                    <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="" readonly>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="name">Nombres</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="" readonly>
                                    <label for="number">Número de seguro</label>
                                    <input type="number" class="form-control" id="numberseg" name="numberseg" placeholder="" readonly>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="direction">Receta</label>
                                    <textarea name="receta" class="form-control" placeholder="Escribe la receta"></textarea>
                                    <button type="submit" class="form-control" id="cf-submit" name="submit2">Registrar receta</button>
                                </div>

                            </div>
                        </form>

                    </div>

                <?php endif; ?>

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