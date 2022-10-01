<div class="modal fade" id="editar_gabeta" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregar_gabeta"></h5>
        <label for="asigPermiso">Editar gaveta</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">       
        <input type="hidden" name="id_log_upt_G" id="id_log_upt_G" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
        <div class="form-group">
          <input type="hidden" name="idG" id="idG" value="">          
          <label for="nombre_g">Nombre</label>
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese nombre de la gaveta" class="form-control" id="nombre_g" name="nombre_g" required>
            <!-- <div class="form-control-position"><i class="icon-file2"></i></div> -->
          </div>
        </div>
        <div class="form-group">
          <label for="descripcion_g">Descripción</label>
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese nombre de la gaveta" class="form-control" id="descripcion_g" name="descripcion_g" required>
            <!-- <div class="form-control-position"><i class="icon-file2"></i></div> -->
          </div>
        </div>

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="editarGaveta($('#idG').val());">Guardar</button>
      </div>
    </div>
  </div>
</div>