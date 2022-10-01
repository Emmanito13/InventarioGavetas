<div class="modal fade" id="nueva_gabeta">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fas fa-archive"></i> Nueva Gaveta</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" name="id_log_newG" id="id_log_newG" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <div class="position-relative has-icon-left">
            <input type="text" placeholder="Ingrese Nombre de gaveta" class="form-control" id="nombre" name="nombre" required>
            <div class="form-control-position"><i class="icon-file2"></i></div>
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <div class="position-relative has-icon-left">
            <input type="text" placeholder="Ingrese descripcion" class="form-control" id="descripciong" name="descripciong" required>
            <div class="form-control-position"><i class="icon-file2"></i></div>
          </div>
        </div>
        <div class="form-group">
          <label for="ccajones">Cantidad de cajones</label>
          <div class="position-relative has-icon-left">
            <input type="number" min="1" placeholder="Ingrese Cantidad" class="form-control" id="cantidadc" name="cantidadc" required>
            <div class="form-control-position"><i class="icon-file2"></i></div>
          </div>
        </div>
        <input type="hidden" name="mecanico" id="mecanico" value="<?php echo $id ?>">
      </div>


      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-window-close"></i> Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="RegistrarGabeta();"> <i class="fas fa-plus"></i> Agregar</button>
      </div>
    </div>
  </div>
</div>