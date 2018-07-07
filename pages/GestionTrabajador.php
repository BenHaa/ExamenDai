<?php
session_start();
include_once '../dto/EmpleadoDto.php';
include_once '../dao/EmpleadoDaoImpl.php';


$lista = EmpleadoDaoImpl::listarEmpleados(1);
$listaTipo = EmpleadoDaoImpl::listarTipoEmpleado();
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

        <script>
            $(document).ready(function () {
                $('#txtRut').rut({formatOn: 'keyup'});
                $('#txtRut2').rut({formatOn: 'keyup'});


                $('#btnHabilitar').click(function () {
                    if (confirm("¿Desea habilitar el trabajador?")) {
                        $.ajax({
                            data: {"rutHabilitar": $('#txtRut2').val(), "habilitar": $('#btnHabilitar').val()},
                            method: 'POST',
                            url: '../server/EstadoTrabajador.php',
                            success: function (response) {
                                //    alert("Se ha habilitado el trabajador");
                                $('#formEstado').submit();
                                // alert(employeeStatus);
                                alert(response);
                            }
                        });
                    }

                });

                $('#btnInhabilitar').click(function () {
                    if (confirm("¿Desea inhabilitar el trabajador?")) {
                        console.log($('#txtRut2').val());
                        console.log($('#btnInhabilitar').val());
                        $.ajax({
                            data: {"rutHabilitar": $('#txtRut2').val(), "inhabilitar": $('#btnInhabilitar').val()},
                            method: 'POST',
                            url: '../server/EstadoTrabajador.php',
                            success: function (response) {

                                $('#formEstado').submit();
                                alert(response);
                            }
                        });
                    }

                });




            });
        </script>





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
                        <a class="simple-text" href="HomeAdmin.php">
                            Admin
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="active">
                            <a href="GestionTrabajador.php">
                                <i class="pe-7s-note2"></i>
                                <p>Gestiónar Trabajadores</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="estadoSolicitud.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Gestión de Análisis de Muestra</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="estadoSolicitud.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Reportes</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">

                    <div class="container-fluid">
                        <div class="navbar-header">

                            <a class="navbar-brand" href="#">Gestionar Trabajadores</a>
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

                <br>
                <br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTrabajador" style="margin-left: 190px;">
                    Agregar Trabajador
                </button>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEstado" style="margin-left: 310px;">
                    Cambiar Estado Trabajador
                </button>


                <br>
                <br>
                <br>



                <div class="content col-xs-offset-1" style="margin-left: 130px;">
                    <div class="container-fluid">

                        <table border="1"class="table-bordered table-hover table-striped" style="width: 100%; margin-left: -70px;">
                            <thead>
                                <tr>
                                    <th style="width: 22%; text-align: center;">Rut </th>
                                    <th style="width: 22%; text-align: center;">Nombre </th>
                                    <th style="width: 22%; text-align: center;">Tipo de Empleado</th>
                                    <th style="width: 22%; text-align: center;">Estado Empleado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lista as $value) { ?>

                                    <tr style="height: 30px;">
                                        <td style="text-align: center;"><?php echo $value->getRut() ?> </td>
                                        <td style="text-align: center;"><?php echo $value->getNombre() ?></td>
                                        <td style="text-align: center;"><?php echo EmpleadoDaoImpl::IdTipoADescripcion($value->getidTipoEmpleado()) ?></td>
                                        <td style="text-align: center;"><?php echo ($value->getEstado()) ? "Hábil" : "Inhábil" ?></td>
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



        <!-- Modal -->
        <div class="modal fade" id="modalAgregarTrabajador" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTrabajador" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center;">
                        <h5 class="modal-title" id="modalAgregarTrabajador">Agregar Trabajador</h5>

                    </div>
                    <form method="POST" action="../server/RegistrarEmpleado.php">
                        <div class="modal-body">

                            <table class="table-bordered table-hover table-striped" style="width:100%;">

                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">Rut Empleado</td>
                                        <td style="width: 50%;"> <input type="text" name="txtRut" id="txtRut" maxlength="12" value="19.360.198-7"  class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">Nombre Empleado</td>
                                        <td><input type="text" name="txtNombre" value="jojo"  class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">Contraseña</td>
                                        <td><input type="text" name="txtContrasena" value="hola123"  class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">Tipo de Empleado</td>
                                        <td><select name="cmbTipo" class="form-control">
                                                <?php foreach ($listaTipo as $value) { ?>
                                                    <option><?php echo $value ?></option>
                                                <?php } ?>
                                            </select>

                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Ingresar Empleado</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <!-- Modal -->
        <div class="modal fade" id="modalEstado" tabindex="-1" role="dialog" aria-labelledby="modalEstadoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center;">
                        <h5 class="modal-title" id="modalEstadoLabel">Cambiar Estado</h5>

                    </div>
                    <div class="modal-body">
                        <form id="formEstado">
                            <table class="table-bordered table-hover table-striped" style="width:100%;">

                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">Rut Empleado</td>
                                        <td style="width: 50%;"> <input type="text" name="txtRut2" id="txtRut2" maxlength="12" value="19.360.198-7"  class="form-control"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <br>

                            <button type="button" class="btn btn-primary" style="margin-left: 100px;" id="btnHabilitar" value="habilitar">Habilitar Trabajador</button>
                            <button type="button" class="btn btn-primary" style="margin-left: 100px;" id="btnInhabilitar" value="inhabilitar">Inhabilitar Trabajador</button>
                        </form>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



    </body>


</html>
