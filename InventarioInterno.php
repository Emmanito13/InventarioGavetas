<?php
session_start();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}
include 'InventarioH.php';
$inv = new Inventario();
$datos = $inv->DatosMecanico($id);
if (isset($_SESSION["user"])) {
  $tipo = $_SESSION["user"]["permisos"];
  if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Inventario</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="icon" type="image/png" href="imagenes/logogeorgio.png" />
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body class="hold-transition sidebar-closed sidebar-collapse">
      <!-- Site wrapper -->
      <div class="wrapper">
        <?php include 'Header/header.php';
        include 'Menu/MenuLateral.php'; ?>
        <style>
          #one {
            border-style: solid;
            border-color: blue;
          }

          p.two {
            border-style: solid;
            border-color: green;
          }

          p.three {
            border-style: dotted;
            border-color: blue;
          }
        </style>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="row justify-content-center">
                    <img class="img-circle elevation-2" src="imagenes/mecanico/<?php echo $datos[0]['foto']?>" style="height:125px; width:120px;" alt="User profile picture">
                  </div>
                  <div class="row justify-content-center">
                    <h5><?php echo $datos[0]['nombre']?></h5>
                  </div>
                  <div class="card-header">
                    <div class="card-tools">
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nueva_gabeta"> <i class="fas fa-archive"></i></button>
                      <a href="Modal/PdfGavetas.php?idMeca=<?php echo $id;?>&nombre=<?php echo $datos[0]['nombre']?>&area=<?php echo $datos[0]['area'];?>" class="btn btn-danger btn-sm"> <i class="fas fa-file-download" aria-hidden="true"> </i>&nbspReporte inventario (PDF)</a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                    <div class="row" id="divgabetas">

                    </div>
                  </div>
                </div>
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
      include 'Modal/CajonGabeta.php';
      include 'Modal/NuevaHerramienta.php';
      include 'Modal/NuevaGabeta.php';
      include 'Modal/DetalleHerramienta.php';
      include 'Modal/CaptchaEditaHerramienta.php';
      include 'Modal/CaptchaEliminaHerramienta.php';
      include 'Modal/EditarHerramienta.php';
      include 'Modal/EditarGaveta.php';
      include 'Modal/EliminarCajon.php';
      include 'Modal/EliminarGaveta.php';
      include 'Modal/ImageView.php';
      include 'Modal/AgregarCajon.php';

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

      <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <!-- SweetAlert2 -->
      <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
      <!-- Toastr -->
      <script src="plugins/toastr/toastr.min.js"></script>
      <!-- JS Fuciones-->
      <script src="js/InventarioH.js" type="text/javascript"></script>
    </body>

    </html>
<?php
  } else {
    //header("location:../pag/Menu/MenuPrincipal.php");
    header("location:index.html");
  }
} else {
  header("location:index.html");
}
?>