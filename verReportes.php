<?php 

    include ("cn.php");

    $usuarios = "SELECT * FROM pacientesregistro";
    $tipo = "SELECT * FROM encuesta";
    $doctores = "SELECT * FROM doctoresregistro"

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Reportes</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

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

    <!-- FILTER -->
    <a href="generarReporte.php"><button type="button" class="btn btn-info btn-lg btn-block">Generar reportes pacientes</button></a>
    <br>
    <a href="generarReporteDoctor.php"><button type="button" class="btn btn-info btn-lg btn-block">Generar reportes doctores</button></a>

    <br><br>

    <div class="input-group"> <span class="input-group-addon">Filtrado pacientes</span>
        <input id="entradafilter" type="text" class="form-control">
    </div>

    <div class="container-table">
        <table class="table table-striped">
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Nombres</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo eléctronico</th>
            <th>Edad</th>
            <th>Ocupación</th>
            <th>Genéro</th>
            <th>Estado civil</th>
            <th>Número de seguro</th>
            <th>Tipo de paciente</th>
            <tbody class="contenidobusqueda">
                <?php $result = mysqli_query($conexion, $usuarios);
                $result2 = mysqli_query($conexion, $tipo);
                while($row = mysqli_fetch_assoc($result) and $row2 = mysqli_fetch_assoc($result2)) {?>    
                <tr>
                    <td><?php echo $row['aPaterno']; ?></td>
                    <td><?php echo $row['aMaterno']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['direction']; ?></td>
                    <td><?php echo $row['telephone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['ocupation']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['civilstatus']; ?></td>
                    <td><?php echo $row['number']; ?></td>
                    <td><?php echo $row2['tipoPaciente']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <br><br>

    <div class="input-group"> <span class="input-group-addon">Filtrado doctores</span>
        <input id="entradafilterDoctor" type="text" class="form-control">
    </div>

    <div class="container-table">
        <table class="table table-striped">
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Nombres</th>
            <th>Correo electrónico</th>
            <tbody class="contenidobusquedaDoctor">
                <?php $result2 = mysqli_query($conexion, $doctores);
                while($row = mysqli_fetch_assoc($result2)) {?>    
                <tr>
                    <td><?php echo $row['aPaterno']; ?></td>
                    <td><?php echo $row['aMaterno']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

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

    <script>
        $(document).ready(function() {
            $('#entradafilter').keyup(function() {
                var rex = new RegExp($(this).val(), 'i');
                $('.contenidobusqueda tr').hide();
                $('.contenidobusqueda tr').filter(function() {
                    return rex.test($(this).text());
                }).show();

            })

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#entradafilterDoctor').keyup(function() {
                var rex2 = new RegExp($(this).val(), 'i');
                $('.contenidobusquedaDoctor tr').hide();
                $('.contenidobusquedaDoctor tr').filter(function() {
                    return rex2.test($(this).text());
                }).show();

            })

        });
    </script>

</body>

</html>