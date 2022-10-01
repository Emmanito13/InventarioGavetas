<?php
session_start();
if (isset($_SESSION["user"])) {
    $tipo = $_SESSION["user"]["permisos"];
    if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Reciclar cajones</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" href="imagenes/logogeorgio.png" />
            <!-- Font Awesome -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <link rel="stylesheet" href="css/hoja_estilo.css">
            <!-- DataTables -->
            <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- SweetAlert2 -->
            <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
            <!-- Toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <!-- overlayScrollbars -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
            <!-- icheck bootstrap -->
            <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        </head>

        <body class="hold-transition sidebar-closed sidebar-collapse">
            <!-- Site wrapper -->
            <div class="wrapper">

                <?php include 'Header/header.php';
                include 'Menu/MenuLateral.php'; ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- /.card -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <div class="row justify-content-center">
                                            <h3 style="color: black;">Cajones</h3>
                                        </div>
                                        <div class="row justify-content-center">
                                            <input type="image" src="imagenes/cajon.png" width="56px">
                                        </div>

                                    </div>
                                    <div class="card-body p-0">
                                        <table id="tablaRCajones" class="display table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>GAVETA</th>
                                                    <th>VER CONTENIDO</th>
                                                    <th>RECUPERAR</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>NOMBRE</th>
                                                    <th>GAVETA</th>
                                                    <th>VER CONTENIDO</th>
                                                    <th>RECUPERAR</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <!-- Main Footer -->
                <?php include 'Footer/footer.php'; ?>

            </div>
            <!-- ./wrapper -->
            <!----------Modals--------------->
            <?php
            include "Modal/RecuperarCajon.php";
            include "Modal/HerramientasCajon.php";
            ?>

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- DataTables -->
            <script src="plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="dist/js/demo.js"></script>
            <!-- SweetAlert2 -->
            <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
            <!-- Toastr -->
            <script src="plugins/toastr/toastr.min.js"></script>
            <!-- JS Fuciones-->
            <script src="js/papelera.js" type="text/javascript"></script>

        </body>

        </html>
<?php
    } else {
        //header("location:../pag/Menu/MenuPrincipal.php");
        header("location:index.html");
    }
} else {
    //header("location:../../");
    header("location:index.html");
}
?>