<?php
session_start();
include_once '../dao/MuestraDaoImpl.php';

$lista = MuestraDaoImpl::listarMuestrasParaAnalisis();
?>

<!doctype html>
<html lang="en">
    <head>

        <meta charset="UTF-8">


        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Bienvenido</title>

        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



        <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/js/light-bootstrap-dashboard.js"></script>
        <script src="../css/js/jquery.rut.js"></script>
        <script src="../css/js/jquery-ui.js"></script>





    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a class="simple-text" href="HomeTecnico.php">
                            TÉCNICO
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="">
                            <a href="AnalisisMuestras.php">
                                <i class="pe-7s-note2"></i>
                                <p>Analizar Muestra</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">

                    <div class="container-fluid">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="#">Analizar Muestra</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">

                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="../server/CerrarSesion.php">
                                        <p>Log out</p>
                                    </a>
                                </li>

                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content col-xs-offset-1" style="margin-left: 80px;">
                    <div class="container-fluid">
                        <table border="1" class="table-bordered  table-striped" style="width:80%; margin-top: 50px; margin-left: 70px;">
                            <thead>
                                <tr>
                                    <th>Código Cliente</th>
                                    <th>Código Muestra</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lista as $value){ ?>
                                <tr>
                                    <td><?php echo $value->getIdMuestra() ?></td>
                                    <td><?php echo $value->getCodigoCliente() ?></td>
                                    <td> Procesar</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">

                    </div>
                </footer>

            </div>
        </div>







    </body>


</html>
