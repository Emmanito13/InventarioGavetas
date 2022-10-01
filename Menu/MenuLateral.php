<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="imagenes/logogeorgio.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Georgio</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link"><img src="imagenes/usuario/<?php echo $_SESSION["user"]["foto"]; ?>" class="img-circle elevation-2" alt="User Image"> <?php echo $_SESSION["user"]["nombre"]; ?>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="UsuarioControlador.php?operador=cerrar_sesion" class="nav-link">
                <i class="fas fa-arrow-alt-circle-right"></i>
                <p>Salir</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="TablaMecanicos.php" class="nav-link">
            <i class="fas fa-boxes"></i>
            <p>
              Inventario
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="TablaMecanicos.php" class="nav-link">
            <i class="fas fa-recycle"></i>
            <p>
              Papelera de reciclaje
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="TablaRGavetas.php" class="nav-link">
                <i class="fas fa-toolbox"></i>
                <p> Gavetas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="TablaRCajones.php" class="nav-link">
                <i class="fas fa-archive"></i>
                <p> Cajones </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="TablaRHerramientas.php" class="nav-link">
                <i class="fas fa-tools"></i>
                <p> Herramientas </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="TablaRMecanicos.php" class="nav-link">
                <i class="fas fa-user-alt"></i>
                <p>Mecánicos</p>
              </a>
            </li>
          </ul>
        </li>
        <?php
        if($_SESSION["user"]["permisos"] == "SUPERADMIN"){
          ?>
          <li class="nav-item has-treeview">
          <a href="usuarios.php" class="nav-link">
          <?php 
          $_SESSION['id_user'] = $_SESSION["user"]["idusuario"];
          ?>
            <i class="fas fa-user-alt"></i>
            <p>
              Usuarios
            </p>
          </a>
        </li>
        <?php
        }
        ?>

<?php
        if($_SESSION["user"]["permisos"] == "SUPERADMIN"){
          ?>
          <li class="nav-item has-treeview">
          <a href="bitacora.php" class="nav-link">
          <?php 
          $_SESSION['id_user'] = $_SESSION["user"]["idusuario"];
          ?>
            <i class="fas fa-file-alt"></i>
            <p>
              Bitácora
            </p>
          </a>
        </li>
        <?php
        }
        ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>