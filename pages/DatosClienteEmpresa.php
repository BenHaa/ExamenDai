<?php
include_once '../dao/ContactoDaoImpl.php';
include_once '../dto/ContactoDto.php';
include_once '../dto/EmpresaDto.php';
include_once '../dao/EmpresaDaoImp.php';

session_start();

//echo "Perfil ".$_SESSION["perfil"];
//if($_SESSION["perfil"]=='2'){
//    echo "<script>alert('bien')</script>";
//}else{
//    header('Location: ../pages/perfil1.php');
//}



if (!empty($_SESSION["updateMsg"])) {
    $msg = $_SESSION["updateMsg"];
}

if (isset($_SESSION["dtoContacto"])) {
    $contacto = $_SESSION["dtoContacto"];
    $rut = $contacto->getRutContacto();
    $nombre = $contacto->getNombreContacto();
    $correo = $contacto->getEmailContacto();
    $telefono = $contacto->getTelefonoContacto();

    $_SESSION["rutContacto"] = $rut;
}

if (isset($_SESSION["dtoEmpresa"])) {
    $empresa = $_SESSION["dtoEmpresa"];
    $rutEmpresa = $empresa->getRut();
    $direccionEmpresa = $empresa->getDireccion();
    $nombreEmpresa = $empresa->getNombre();
    $contrasena = $empresa->getPassword();

    $codigo = EmpresaDaoImp::buscarCodigoCliente($rutEmpresa);
    $_SESSION["rutEmpresa"] = $rutEmpresa;
    $_SESSION["codigoEmpresa"] = $codigo;
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


        <style>
            .modal-footer{
                border-top: 0px;
            }

        </style>


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
                        <li class="active">
                            <a href="DatosCliente.php">
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

                            <a class="navbar-brand" href="#">Datos Cliente </a>
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

                        <form action="../server/ActualizarDatosEmpresaYContacto.php" method="POST">

                            <table class="table-bordered table-hover table-striped" style="width: 50%; margin-left: -100px; ">
                                <thead>
                                    <tr>
                                        <th style="width: 22%; text-align: center; height: 40px;" colspan="2">Modificar Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 50px;">
                                        <td style="text-align: center;">Rut &nbsp; <input class="form-control" style="width: 30%; display: inline-block; margin: 0px -40px; margin-left: 78px;"  value="<?php echo $rut ?>" disabled />  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center">Nombre  &nbsp; <input class="form-control"  name="txtNombre"  value="<?php echo $nombre; ?>" style="width: 30%; display: inline-block; margin: 0px -26px; margin-left: 60px;" required/>  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center">Teléfono &nbsp; <input class="form-control" name="txtTelefono"  value="<?php echo $telefono; ?>" style="width: 30%; display: inline-block; margin: 0px -18px; margin-left: 53px;" required/>  </td>
                                    </tr>


                                    <tr style="height: 50px;">
                                        <td style="text-align: center">E-mail &nbsp; <input class="form-control" name="txtEmail" value="<?php echo $correo; ?>"  style="width: 30%; display: inline-block; margin: 0px -31px; margin-left: 62px;" required />  </td>
                                    </tr>

                                </tbody>
                            </table>
                            <br>
                            <br>

                            <button type="submit" name="updContacto" value="updContacto" class="btn btn-primary">Actualizar Datos Contacto</button>


                        </form>

                        <form action="../server/ActualizarDatosEmpresaYContacto.php" method="POST">
                            <table class="table-bordered table-hover table-striped" style="width: 50%; margin-left: 337px; margin-top: -316px;">
                                <thead>
                                    <tr>
                                        <th style="width: 22%; text-align: center; height: 40px;" colspan="2">Modificar  Empresa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 50px;">
                                        <td style="text-align: center;">Rut &nbsp; <input class="form-control" style="width: 30%; display: inline-block; margin: 0px -40px; margin-left: 78px;"  value="<?php echo $rutEmpresa ?>" disabled />  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center;">Código Cliente&nbsp; <input class="form-control" style="width: 30%; display: inline-block;  margin: -7px -6px; margin-left: 47px;" value="<?php echo $codigo; ?>" disabled />  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center">Nombre  &nbsp; <input class="form-control"  name="txtNombre"   value="<?php echo $nombreEmpresa; ?>" style="width: 30%; display: inline-block; margin: 0px -26px; margin-left: 60px;" required/>  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center">Contraseña &nbsp; <input class="form-control"  name="txtContrasena" value="<?php echo $contrasena; ?>" style="width: 30%; display: inline-block; margin: 0px -18px; margin-left: 46px;" required/>  </td>
                                    </tr>

                                    <tr style="height: 50px;">
                                        <td style="text-align: center">Dirección &nbsp; <input class="form-control" name="txtDireccion"  value="<?php echo $direccionEmpresa; ?>" style="width: 30%; display: inline-block; margin: 0px -18px; margin-left: 53px;" required/>  </td>
                                    </tr>


                                </tbody>
                            </table>

                            <button type="submit"  name="updEmpresa" value="updEmpresa" class="btn btn-primary" style="margin-top: 42px; margin-left: 475px;">Actualizar Datos Empresa</button>

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

<?php unset($_SESSION["updateMsg"]); ?>

            });
        </script>





        <!-- Modal -->
        <div class="modal fade" id="modalTelefonos" tabindex="-1" role="dialog" aria-labelledby="modalTelefonos" aria-hidden="true">
            <div class="modal-dialog" role="document"  style="margin-left: 420px; margin-top: 50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <br>
                        <h5 style="text-align: center; font-size: larger" class="modal-title" id="modalTelefonos">Teléfonos del Particular</h5>

                    </div>
                    <br>
                    <form action="../server/GestionarTelefonosParticular.php" method="POST">
                        <div class="modal-body">
                            <p style="margin-left: 100px; display: inline-block;"> Teléfono  </p> &nbsp; <select name="cmbTelefono" class="form-control" style="width:180px; display: inline-block"/> 
                            <?php
                            foreach ($telefonos as $value) {
                                echo "<option>" . $value . "</option>";
                            }
                            ?>
                            </select> &nbsp;&nbsp;
                            <button class="btn btn-primary"  name="eliminar" value="eliminar" style="display: inline-block; margin-left: 4px;">Eliminar Número </button>

                            <br>
                            <br>
                            <p style="margin-left: 100px; display: inline-block;">Teléfono </p> &nbsp; <input type="text"  placeholder="Ej: +56912345678"name="txtTelefono" class="form-control" style="width:180px; display: inline-block"/>
                            &nbsp; &nbsp;
                            <button class="btn btn-primary" style="display: inline-block;" name="agregar" value="agregar">Agregar Número </button>
                        </div>
                    </form>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>



    </body>


</html>
