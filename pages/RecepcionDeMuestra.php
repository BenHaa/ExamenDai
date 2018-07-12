<?php
session_start();

//echo "Perfil ".$_SESSION["perfil"];
//if($_SESSION["perfil"]=='2'){
//    echo "<script>alert('bien')</script>";
//}else{
//    header('Location: ../pages/perfil1.php');
//}
if (!empty($_SESSION["envioMsg"])) {
    $msg = $_SESSION["envioMsg"];
}
?>
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
                        <a class="simple-text" href="HomeReceptor.php">
                            RECEPTOR
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="">
                            <a href="RecepcionDeMuestra.php">
                                <i class="pe-7s-note2"></i>
                                <p>Recepción de Muestra</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">

                    <div class="container-fluid">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="#">Recepción de Muestra</a>
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

                <form action="../server/RecepcionarMuestra.php" method="POST">
                    <div class="content col-xs-offset-1" style="margin-left: 130px;">
                        <div class="container-fluid" style='margin-top: 40px; margin-left: 80px;'>
                            <input placeholder="Código Cliente" class="form-control" name="txtCodigo" value="5" style="display: inline-block; width:300px;"/> &nbsp;&nbsp;&nbsp;
                            <input placeholder="Rut Cliente" class="form-control" name="txtRut" value="12345" style="display:inline-block; width:300px;"/>
                            <br>
                            <input placeholder="Nombre Cliente" class="form-control" name="txtNombre" value="a" style="display:inline-block; width:300px; margin-top: 20px;"/>&nbsp;&nbsp;&nbsp;&nbsp;

                            <input placeholder="Fecha de Recepción" class="form-control" id="txtFecha" name="txtFecha" style="display:inline-block; width:300px;"/>
                            <br>
                            <input placeholder="Temperatura de Muestra" class="form-control"  value="10.3" name="txtTemperatura" style="display:inline-block; width:300px;  margin-top: 20px;"/>&nbsp;&nbsp;&nbsp;&nbsp;
                            <input placeholder="Cantidad de Muestra" class="form-control" value="3" name="txtCantidadMuestra" style="display:inline-block;  width:300px;"/>
                        </div>


                        <div class="container-fluid" style='margin-top: 40px; margin-left: 80px;'>
                            <p>Tipos de análisis a realizar</p>


                            <input type="checkbox" name="chkMicotoxina" value="ON" /> Micotoxina
                            <br>
                            <br>
                            <input type="checkbox" name="chkMetalesPesados" value="ON" /> Metales Pesados
                            <br>
                            <br>
                            <input type="checkbox" name="chkPlaguicida" value="ON" /> Detección de plaguicida
                            <br>
                            <br>
                            <input type="checkbox" name="chkMareaRoja" value="ON" /> Marea Roja
                            <br>
                            <br>
                            <input type="checkbox" name="chkBacteriasNocivas" value="ON" /> Detección de bacterias nocivas
                            <br>

                        </div>


                        <button class="btn btn-primary submit" style="margin-left: 330px; margin-top: 40px;">Recepcionar Muestra </button>

                    </div>
                </form>



                <footer class="footer">
                    <div class="container-fluid">

                    </div>
                </footer>

            </div>
        </div>



        <script>
            $(document).ready(function () {
                var msg = "<?php echo $msg ?>";
                alert(msg);

<?php unset($_SESSION["envioMsg"]); ?>

            });
        </script>

    </body>


</html>
