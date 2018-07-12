<?php
include_once '../dao/MuestraDaoImpl.php';
include_once '../dto/MuestraDto.php';
include_once '../dao/AnalisisDaoImpl.php';
session_start();


$listaMuestras = MuestraDaoImpl::listarMuestrasPorCodigoCliente(3);
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
                        <a class="simple-text" href="HomeCliente.php">
                            CLIENTE
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="">
                            <?php if (isset($_SESSION["dtoParticular"])) { ?>
                                <a href="DatosCliente.php">
                                <?php } elseif (isset($_SESSION["dtoEmpresa"])) { ?>
                                    <a href="DatosClienteEmpresa.php">        
                                    <?php } ?>
                                    <i class="pe-7s-note2"></i>
                                    <p>Datos Personales</p>
                                </a>
                        </li>
                        <li class="">
                            <a href="EnvioMuestraCliente.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Enviar Muestra</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="EstadoMuestraCliente.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Estado de Muestra</p>
                            </a>
                        </li>



                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">

                    <div class="container-fluid">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="#">Estado de las muestras del Cliente</a>
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
                        <form id="formSearch" method="POST" action="../server/BuscarMuestras.php">
                            <br>

                            <table border="1"class="table-bordered  table-striped" style="width: 98%; margin-left:   0px;">
                                <thead >
                                    <tr>
                                        <th colspan="2" style="width: 22%; text-align: center; height: 30px;">Buscar Muestras</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr style="height: 60px;">
                                        <td>&nbsp;&nbsp;Rut o Código de Cliente &nbsp;&nbsp;&nbsp;&nbsp; 
                                            <input name="txtCodigoCliente" type="text" class="form-control" style="width: 30%; display: inline-block"/>
                                            <button type="submit" class="btn btn-primary" name="btnBuscarPorCodCliente" value="cod" style="display: inline-block"> Buscar </button>

                                            &nbsp; 
                                        <td>
                                            &nbsp;&nbsp; Código de Muestra&nbsp;&nbsp; 
                                            <input name="txtCodigoMuestra" type="number"  value="1" class="form-control" style="width: 30%; display: inline-block"/>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                            <button type="submit" class="btn btn-primary" name="btnBuscarPorCodMuestra" value="code" style="display: inline-block"> Buscar </button>

                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </form>

                        <br>
                        <br>
                        <br>


                        <?php
                        if (!empty($_SESSION["lista"])) {
                            $listaMuestras = $_SESSION["lista"];
                            ?>
                            <table border="1" class="table-bordered  table-striped" style="margin-left: 90px; width: 70%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Código de Muestra</th>
                                        <th style="text-align: center;">Temperatura Muestra</th>
                                        <th style="text-align: center;">Cantidad Muestra</th>
                                        <th style="text-align: center;">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listaMuestras as $value) {
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"> <?php echo $value->getIdMuestra(); ?></td>
                                            <td style="text-align: center;"> <?php echo $value->getTemperaturaMuestra(); ?></td>
                                            <td style="text-align: center;"> <?php echo $value->getCantidadMuestra(); ?></td>
                                            <td style="text-align: center;"> <?php echo AnalisisDaoImpl::listarEstadoResultadoMuestra($value->getIdMuestra()) ? "Terminada" : "En proceso" ?> </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        <?php } ?>





                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">

                    </div>
                </footer>

            </div>
        </div>





        <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/js/light-bootstrap-dashboard.js"></script>
        <script src="../css/js/jquery.rut.js"></script>
        <script src="../css/js/jquery-ui.js"></script>


    </body>


</html>
