
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login V1</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
        <!--===============================================================================================-->

        <script src="../assets/js/jquery331.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>





    </head>
    <body>

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="../assets/images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" action="../server/Login.php" method="POST">
                        <span class="login100-form-title">
                            BIENVENIDO
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Usuario requerido">
                            <input class="input100" type="text" name="txtUserName" placeholder="&nbsp;User Name"id="txtUserName" >
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-id-card" aria-hidden="true"></i>
                            </span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate = "Contraseña requerida">
                            <input class="input100" type="password" name="txtPassword" placeholder="Contraseña" value="hola" maxlength="12">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                INICIAR SESION
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Olvidó su
                            </span>
                            <a class="txt2" href="#">
                                Contraseña?
                            </a>
                        </div>
                        <div class="text-center p-t-136">
                            <button class="txt2"  data-toggle="modal" data-target="#exampleModal">
                                Registrar Cuenta
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->	
        <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="../assets/vendor/bootstrap/js/popper.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="../assets/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="../assets/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            });
        </script>
        <!--===============================================================================================-->
        <script src="../assets/js/main.js"></script>

        <!-- Button trigger modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" >¿a qué clase de usuario pertenece usted?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-content">
                            <table class="table"
                                   <tbody>
                                    <tr>
                                        <td><a  href="RegistrarParticular.php"><button style="width: 90%"class="btn btn-primary">Particular</button></a></td>
                                        <td><a  href="RegistrarEmpresa.php"><button style="width: 90%" class="btn btn-dark">Empresa</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        session_start();
        if (!empty($_SESSION["updateMsg"])) {
            $msg = $_SESSION["updateMsg"];
        }
        ?>
        <script>
            $(document).ready(function () {
                var msg = "<?php echo $msg ?>";
                alert(msg);

<?php unset($_SESSION["updateMsg"]); ?>

            });
        </script>
    </body>
</html>
