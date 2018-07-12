<?php
session_start();
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>





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
                            <a href="DatosCliente.php">
                                <i class="pe-7s-note2"></i>
                                <p>Datos Personales Cliente</p>
                            </a>
                        </li>
                        <li class="">
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

                            <a class="navbar-brand" href="#">Home Cliente</a>
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

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <form action="../server/resultadosMuestras.php" method="POST">
                                    <table class="table-responsive">
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="txtCod" class="" placeholder="Codigo Muestra"></td>
                                                <td><input type="submit" value="Buscar" class="btn btn-hover"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <?php
//                                var_dump($_SESSION);
                                ?>
                            </div>
                            <div class="col-lg-4">

                            </div>
                        </div>
                        <div class="row">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                </div>



                <footer class="footer">
                    <div class="container-fluid">

                    </div>
                </footer>

            </div>
        </div>
        <?php
        if (!isset($_SESSION["Micotoxinas"])) {
            $_SESSION["Micotoxinas"]=0;
        }
        if (!isset($_SESSION["Metales"])) {
            $_SESSION["Metales"]=0;
        }
        if (!isset($_SESSION["Marea"])) {
            $_SESSION["Marea"]=0;
        }
        if (!isset($_SESSION["Plaguicidas"])) {
            $_SESSION["Plaguicidas"]=0;
        }
        if (!isset($_SESSION["Bacterias"])) {
            $_SESSION["Bacterias"]=0;
        }
        ?>

        <script>
            var Micotoxinas = <?php echo $_SESSION["Micotoxinas"] ?>;
            var Metales = <?php echo $_SESSION["Metales"] ?>;
            var Plaguicidas = <?php echo $_SESSION["Plaguicidas"] ?>;
            var Marea = <?php echo $_SESSION["Marea"] ?>;
            var Plaguicidas = <?php echo $_SESSION["Plaguicidas"] ?>;
            var Bacterias = <?php echo $_SESSION["Bacterias"] ?>;
            
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Micotoxinas", "Metales Pesados", "Plaguicidas Prohibidos", "Marea Roja", "Bacterias Nocivas"],
                    datasets: [{
                            label: 'Resultados del analisis de la muestra <?php echo $_SESSION["id_muestra"] ?>',
                            data: [
                                Micotoxinas,
                                Metales,
                                Plaguicidas,
                                Marea,
                                Bacterias
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>


</html>

