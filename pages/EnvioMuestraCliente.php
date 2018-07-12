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
                        <li class="active">
                            <a href="EnvioMuestraCliente.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Enviar Muestra</p>
                            </a>
                        </li>
                        <li class="">
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

                            <a class="navbar-brand" href="#">Enviar Muestra</a>
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

                <div class="content col-xs-offset-1" style="margin-left: 130px;">
                    <div class="container-fluid">
                        <form action="../server/EnvioMuestra.php" method="POST">
                            <table border="1"class="table-bordered table-hover table-striped" style="width: 50%; margin-left: 120px;">
                                <thead>
                                    <tr>
                                        <th style="width: 22%; text-align: center; height: 40px;" colspan="2">Enviar Muestra</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <tr style="height: 50px;">
                                        <td style="text-align: center;">Temperatura &nbsp; <input  name="txtTemperatura" type="text" placeholder="Ej: 25.34" class="form-control" style="width: 30%; display: inline-block; margin: 0px -47px; margin-left: 72px;"/>  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center">Cantidad &nbsp; <input name="txtCantidad" type="number" min="1" class="form-control" style="width: 30%; display: inline-block;   margin: 0px -57px; margin-left: 88px;"/>  </td>
                                    </tr>


                                </tbody>
                            </table>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary col-xs-offset-4">Enviar Muestra</button>
                        </form>

                    </div>
                </div>


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
