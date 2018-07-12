<?php ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Registro de Particulares</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <script src="../css/js/jquery331.js"></script>
        <script src="../css/js/jquery.rut.js"></script>

    </head>

    <style>

        #exampleModal .modal-background{
            display:none;

        }

    </style>

    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="LoginUser.php" class="simple-text">
                            INICIAR SESION
                        </a>
                    </div>

                </div>
            </div>

            <div class="main-panel">

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4">
                                <h3>
                                    REGISTRAR PARTICULAR  
                                </h3>
                            </div>
                            <div class="col-4">
                                <form action="../server/registrarParticular.php" method="POST"> 
                                    <table class="table-bordered table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td>Rut</td>
                                                <td><input type="text" name="txtRut" id="txtRut" size="13"required></td>
                                            </tr>
                                            <tr>
                                                <td>Nombre</td>
                                                <td><input type="text" name="txtNombre"required></td>
                                            </tr>
                                            <tr>
                                                <td>Contraseña</td>
                                                <td><input type="text" name="txtPassword"required></td>
                                            </tr>
                                            <tr>
                                                <td>Direccion</td>
                                                <td><input type="text" name="txtDireccion"required></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><input type="email" name="txtEmail"required></td>
                                            </tr>
                                            <tr>
                                                <td>Telefono1</td>
                                                <td><input type="text" name="txtTel1"required></td>
                                            </tr>
                                            <tr>
                                                <td>Telefono2 (opcional)</td>
                                                <td><input type="text" name="txtTel2"></td>
                                            </tr>
                                        </tbody>
                                    </table><br><br>
                                    <input type="submit" value="Registrar Particular" class="btn btn-primary btn-hover">

                                </form>
                                <script>
                                    $('#txtRut').rut({formatOn: 'keyup'});
                                </script>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>




    </body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>
    <script src="../assets/js/light-bootstrap-dashboard.js"></script>


</html>

