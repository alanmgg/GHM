<?php

require 'database.php';

$message = '';

$number = rand(100000, 999999);
$contador = 0;
$tipo = '';
$vacio = '';

if (isset($_POST['fiebre'])) {
    if ($_REQUEST['fiebre'] == "No he tenido") {
        $contador = $contador + 0;
    } else if ($_REQUEST['fiebre'] == "Menos de 38 grados") {
        $contador = $contador + 1;
    } else if ($_REQUEST['fiebre'] == "38 grados") {
        $contador = $contador + 2;
    } else if ($_REQUEST['fiebre'] == "39 grados") {
        $contador = $contador + 3;
    }
}

if (isset($_POST['cabeza'])) {
    if ($_REQUEST['cabeza'] == "No he tenido") {
        $contador = $contador + 0;
    } else if ($_REQUEST['cabeza'] == "Bajo") {
        $contador = $contador + 1;
    } else if ($_REQUEST['cabeza'] == "Moderado") {
        $contador = $contador + 2;
    } else if ($_REQUEST['cabeza'] == "Alto") {
        $contador = $contador + 3;
    }
}

if (isset($_POST['respirar'])) {
    if ($_REQUEST['respirar'] == "No he tenido") {
        $contador = $contador + 0;
    } else if ($_REQUEST['respirar'] == "Bajo") {
        $contador = $contador + 1;
    } else if ($_REQUEST['respirar'] == "Moderado") {
        $contador = $contador + 2;
    } else if ($_REQUEST['respirar'] == "Alto") {
        $contador = $contador + 3;
    }
}

if (isset($_POST['huesos'])) {
    if ($_REQUEST['huesos'] == "No he tenido") {
        $contador = $contador + 0;
    } else if ($_REQUEST['huesos'] == "Bajo") {
        $contador = $contador + 1;
    } else if ($_REQUEST['huesos'] == "Moderado") {
        $contador = $contador + 2;
    } else if ($_REQUEST['huesos'] == "Alto") {
        $contador = $contador + 3;
    }
}

if (isset($_POST['cansancio'])) {
    if ($_REQUEST['cansancio'] == "No he tenido") {
        $contador = $contador + 0;
    } else if ($_REQUEST['cansancio'] == "Bajo") {
        $contador = $contador + 1;
    } else if ($_REQUEST['cansancio'] == "Moderado") {
        $contador = $contador + 2;
    } else if ($_REQUEST['cansancio'] == "Alto") {
        $contador = $contador + 3;
    }
}

if (isset($_POST['fluido'])) {
    if ($_REQUEST['fluido'] == "No he tenido") {
        $contador = $contador + 0;
    } else if ($_REQUEST['fluido'] == "Bajo") {
        $contador = $contador + 1;
    } else if ($_REQUEST['fluido'] == "Moderado") {
        $contador = $contador + 2;
    } else if ($_REQUEST['fluido'] == "Alto") {
        $contador = $contador + 3;
    }
}

if ($contador>0 && $contador<=7) {
    $tipo = 'Quedate en casa';
} else if ($contador>7 && $contador<=14) {
    $tipo = 'Consulta externa';
} else {
    $tipo = 'Urgencias';
}

if (!empty($_POST['aPaterno']) && !empty($_POST['aMaterno']) && !empty($_POST['name']) && !empty($_POST['direction']) && !empty($_POST['telephone']) && !empty($_POST['email'])) {
    if (isset($_POST['fiebre']) && isset($_POST['cabeza']) && isset($_POST['respirar']) && isset($_POST['huesos']) && isset($_POST['cansancio']) && isset($_POST['fluido']) && isset($_POST['alergias'])) {
        
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

        $sql2 = "INSERT INTO encuesta (aPaterno, aMaterno, name, age, fiebre, cabeza, respirar, huesos, cansancio, fluido, alergias, tipoPaciente) VALUES (:aPaterno, :aMaterno, :name, :age, :fiebre, :cabeza, :respirar, :huesos, :cansancio, :fluido, :alergias, :tipoPaciente)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':aPaterno', $_POST['aPaterno']);
        $stmt2->bindParam(':aMaterno', $_POST['aMaterno']);
        $stmt2->bindParam(':name', $_POST['name']);
        $stmt2->bindParam(':age', $_POST['age']);
        $stmt2->bindParam(':fiebre', $_REQUEST['fiebre']);
        $stmt2->bindParam(':cabeza', $_REQUEST['cabeza']);
        $stmt2->bindParam(':respirar', $_REQUEST['respirar']);
        $stmt2->bindParam(':huesos', $_REQUEST['huesos']);
        $stmt2->bindParam(':cansancio', $_REQUEST['cansancio']);
        $stmt2->bindParam(':fluido', $_REQUEST['fluido']);
        $stmt2->bindParam(':alergias', $_REQUEST['alergias']);

        $stmt2->bindParam(':tipoPaciente', $tipo);

        if ($stmt2->execute()) {
            $message = 'Ha sido creado su usuario y se registro su encuesta correctamente. Además el sistema le dice al usuario: ' . $tipo;
        } else {
            $message = 'Lo sentimos ha ocurrido un error';
        }

        $sql3 = "INSERT INTO receta (aPaterno, aMaterno, name, text, number) VALUES (:aPaterno, :aMaterno, :name, :text, :number)";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bindParam(':aPaterno', $_POST['aPaterno']);
        $stmt3->bindParam(':aMaterno', $_POST['aMaterno']);
        $stmt3->bindParam(':name', $_POST['name']);

        $stmt3->bindParam(':text', $vacio);

        $stmt3->bindParam(':number', $number);

        if ($stmt3->execute()) {
            $message = 'Ha sido creado su usuario y se registro su encuesta correctamente. Además el sistema le dice al usuario: ' . $tipo . '.';
        } else {
            $message = 'Lo sentimos ha ocurrido un error';
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Encuesta</title>
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

    <!-- ENCUESTA -->
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
                    <form id="appointment-form" role="form" method="post" action="encuesta.php">

                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                            <h2>Encuesta</h2>
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
                                            <input type="radio" name="ocupation" id="estudiante" value="Estudiante">
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
                                            <input type="radio" name="gender" id="masculino" value="Masculino">
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
                                            <input type="radio" name="civilstatus" id="soltero" value="Soltero">
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

                            <div class="col-md-12 col-sm-12">
                                <label for="fiebre">¿Qué temperatura de fiebre ha tenido?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="fiebre" id="fiebre0" value="No he tenido">
                                            <label for="fiebre0">No he tenido</label>
                                            <input type="radio" name="fiebre" id="fiebre1" value="Menos de 38 grados">
                                            <label for="fiebre1">Menos de 38 grados</label>
                                            <input type="radio" name="fiebre" id="fiebre2" value="38 grados">
                                            <label for="fiebre2">38 grados</label>
                                            <input type="radio" name="fiebre" id="fiebre3"" value="39 grados">
                                            <label for="fiebre3">39 grados</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="cabeza">¿Con qué intensidad ha tenido dolor de cabeza?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="cabeza" id="cabeza0" value="No he tenido">
                                            <label for="cabeza0">No he tenido</label>
                                            <input type="radio" name="cabeza" id="cabeza1" value="Bajo">
                                            <label for="cabeza1">Bajo</label>
                                            <input type="radio" name="cabeza" id="cabeza2" value="Moderado">
                                            <label for="cabeza2">Moderado</label>
                                            <input type="radio" name="cabeza" id="cabeza3" value="Alto">
                                            <label for="cabeza3">Alto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="respirar">¿Con qué intensidad ha tenido dificultad para respirar?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="respirar" id="respirar0" value="No he tenido">
                                            <label for="respirar0">No he tenido</label>
                                            <input type="radio" name="respirar" id="respirar1" value="Bajo">
                                            <label for="respirar1">Bajo</label>
                                            <input type="radio" name="respirar" id="respirar2" value="Moderado">
                                            <label for="respirar2">Moderado</label>
                                            <input type="radio" name="respirar" id="respirar3" value="Alto">
                                            <label for="respirar3">Alto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="huesos">¿Con qué intensidad ha tenido dolor de huesos?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="huesos" id="huesos0" value="No he tenido">
                                            <label for="huesos0">No he tenido</label>
                                            <input type="radio" name="huesos" id="huesos1" value="Bajo">
                                            <label for="huesos1">Bajo</label>
                                            <input type="radio" name="huesos" id="huesos2" value="Moderado">
                                            <label for="huesos2">Moderado</label>
                                            <input type="radio" name="huesos" id="huesos3" value="Alto">
                                            <label for="huesos3">Alto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="cansancio">¿Con qué intensidad ha tenido cansancio?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="cansancio" id="cansancio0" value="No he tenido">
                                            <label for="cansancio0">No he tenido</label>
                                            <input type="radio" name="cansancio" id="cansancio1" value="Bajo">
                                            <label for="cansancio1">Bajo</label>
                                            <input type="radio" name="cansancio" id="cansancio2" value="Moderado">
                                            <label for="cansancio2">Moderado</label>
                                            <input type="radio" name="cansancio" id="cansancio3" value="Alto">
                                            <label for="cansancio3">Alto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="fluido">¿Con qué intensidad ha tenido fluido nasal?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="fluido" id="fluido0" value="No he tenido">
                                            <label for="fluido0">No he tenido</label>
                                            <input type="radio" name="fluido" id="fluido1" value="Bajo">
                                            <label for="fluido1">Bajo</label>
                                            <input type="radio" name="fluido" id="fluido2" value="Moderado">
                                            <label for="fluido2">Moderado</label>
                                            <input type="radio" name="fluido" id="fluido3" value="Alto">
                                            <label for="fluido3">Alto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="alergias">¿Tienes alergías?</label>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="wrap">
                                    <div class="formulario">
                                        <div class="radio">
                                            <input type="radio" name="alergias" id="alergias0" value="No tiene">
                                            <label for="alergias0">No tengo</label>
                                            <input type="radio" name="alergias" id="alergias1" value="A algunos alimentos">
                                            <label for="alergias1">A algunos alimentos</label>
                                            <input type="radio" name="alergias" id="alergias2" value="A algunos medicamentos">
                                            <label for="alergias2">A algunos medicamentos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>** Tenga en cuenta que con los datos ingresados se registrará al paciente en el hospital</p>
                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="form-control" id="cf-submit" name="submit">Enviar encuesta</button>
                            </div>

                        </div>
                    </form>

                </div>

                <div class="section-title wow fadeInUp" data-wow-delay="0.8s">
                    <div class="col-md-4 col-sm-4">
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