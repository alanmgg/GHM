<?php

require 'database.php';

$message = '';

$number = rand(100000, 999999);

if (!empty($_POST['aPaterno']) && !empty($_POST['aMaterno']) && !empty($_POST['name']) && !empty($_POST['direction']) && !empty($_POST['telephone']) && !empty($_POST['email'])) {
  $sql = "INSERT INTO pacientesregistro (aPaterno, aMaterno, name, direction, telephone, email, age, ocupation, gender, civilstatus, number) VALUES (:aPaterno, :aMaterno, :name, :direction, :telephone, :email, :age, :ocupation, :gender, :civilstatus, :number)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':aPaterno', $_POST['aPaterno']);
  $stmt->bindParam(':aMaterno', $_POST['aMaterno']);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':direction', $_POST['direction']);
  $stmt->bindParam(':telephone', $_POST['telephone']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':age', $_POST['age']);
  $stmt->bindParam(':ocupation', $_REQUEST['ocupation']);
  $stmt->bindParam(':gender', $_REQUEST['gender']);
  $stmt->bindParam(':civilstatus', $_REQUEST['civilstatus']);

  $stmt->bindParam(':number', $number);

  if ($stmt->execute()) {
    $message = 'Ha sido creado su usuario correctamente';
  } else {
    $message = 'Lo sentimos ha ocurrido un error';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Registro paciente</title>
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
    <link rel="stylesheet" href="css/styleEncuesta.css">

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
        <div class="alert alert-danger" role="alert"><?= $message; ?></div>
    <?php endif; ?>

    <!-- REGISTRO -->
    <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
            <div class="row">

                <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                    <div class="col-md-4 col-sm-4">
                        <img src="images/login-image1.jpg" class="img-responsive" alt="">
                    </div>
                </div>

                <div class="col-md-8 col-sm-8">
                    <!-- CONTACT FORM HERE -->
                    <form id="appointment-form" role="form" method="post" action="#">

                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Registro paciente</h2>
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
                                <label for="direction">Dirección</label>
                                <input type="text" class="form-control" id="direction" name="direction" placeholder="Dirección" required>
                                <label for="email">Correo</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Correo eléctronico" required>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="telephone">Teléfono</label>
                                <input type="number" class="form-control" id="telephone" name="telephone" placeholder="Teléfono de contacto" required>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <label for="age">Edad</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Edad" required>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="ocupation">Ocupación</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="ocupation" id="estudiante" value="Estudiante" checked>
                                            <label for="estudiante">Estudiante</label>
                                            <input type="radio" name="ocupation" id="trabajador" value="Trabajador">
                                            <label for="trabajador">Trabajador</label>
                                            <input type="radio" name="ocupation" id="ama" value="Ama de casa">
                                            <label for="ama">Ama de casa</label>
                                            <input type="radio" name="ocupation" id="comerciante" value="Comerciante">
                                            <label for="comerciante">Comerciante</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="gender">Género</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="gender" id="masculino" value="Masculino" checked>
                                            <label for="masculino">Masculino</label>
                                            <input type="radio" name="gender" id="femenino" value="Femenino">
                                            <label for="femenino">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="civilstatus">Estado civil</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="civilstatus" id="soltero" value="Soltero" checked>
                                            <label for="soltero">Soltero</label>
                                            <input type="radio" name="civilstatus" id="casado" value="Casado">
                                            <label for="casado">Casado</label>
                                            <input type="radio" name="civilstatus" id="viudo" value="Viudo">
                                            <label for="viudo">Viudo</label>
                                            <input type="radio" name="civilstatus" id="divorciado" value="Divorciado">
                                            <label for="divorciado">Divorciado</label>
                                            <input type="radio" name="civilstatus" id="union" value="Unión libre">
                                            <label for="union">Unión libre</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>** Tenga en cuenta que con los datos ingresados se registrará al paciente en el hospital</p>
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