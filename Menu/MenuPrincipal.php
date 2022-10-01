<?php
 session_start(); 
  if(isset($_SESSION["user"])){ 
    $tipo = $_SESSION["user"]["permisos"];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Menú</title>
  <link rel="icon" type="image/png" href="../../imagenes/logogeorgio.png" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../../imagenes/usuario/<?php echo $_SESSION["user"]["foto"]; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="height: 40px; width: 40px; opacity: .8">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?php echo $_SESSION["user"]["nombre"]; ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="../../Controlador/UsuarioControlador.php?operador=cerrar_sesion" class="dropdown-item">Cerrar Sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          <!-- small card -->
          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN' || $tipo == 'RECEPCION') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Recepción</h3>
              </div>
              <div class="icon">
                <i class="fas fa-concierge-bell"></i>
              </div>
              <a href="../Recepcion.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN' || $tipo == 'RECEPCION') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Unidades</h3>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="../UnidadesCatalogo.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>
          
          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Mecánicos</h3>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="../Mecanicos.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Usuarios</h3>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="../Usuarios.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Proveedores</h3>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="../Proveedores.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Reparto</h3>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <a href="../Reparto.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>


          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Catalogo Refacciones</h3>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
              <a href="../CatalogoRefacciones.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>


          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN' || $tipo == 'RECEPCION') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Clientes</h3>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="../Clientes.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Refacciones</h3>
              </div>
              <div class="icon">
                <i class="fas fa-tools"></i>
              </div>
              <a href="../Refacciones.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN' || $tipo == 'RECEPCION' || $tipo == 'JEFETALLER') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Servicios</h3>
              </div>
              <div class="icon">
                <i class="far fa-handshake"></i>
              </div>
              <a href="../Servicios.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN' || $tipo == 'RECEPCION') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Compras Externas</h3>
              </div>
              <div class="icon">
                <i class="fas fa-external-link-alt"></i>
              </div>
              <a href="../ComprasExternas.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Compras</h3>
              </div>
              <div class="icon">
                <i class="fas fa-cash-register"></i>
              </div>
              <a href="../Compras.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Actividades</h3>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="../Actividades.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'ADMIN') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Compras Catálogo</h3>
              </div>
              <div class="icon">
                <i class="fas fa-cash-register"></i>
              </div>
              <a href="../ComprasCatalogo.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>

          <?php if ($tipo == 'SUPERADMIN' || $tipo == 'CORTES') { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Cortes de Caja</h3>
              </div>
              <div class="icon">
                <i class="fas fa-cash-register"></i>
              </div>
              <a href="../Cortes.php" class="small-box-footer">
                Ir <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          <?php } else{}?>
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 
  <!-- Main Footer -->
<?php include '../Footer/footer.php';?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php
}
else {
    header("location:../../");
}
?>