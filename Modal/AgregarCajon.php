<div class="modal fade" id="agregar_cajon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregar_cajon"></h5>
        <label>Agregar un cajón</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" name="id_log_newC" id="id_log_newC" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
        <div class="form-group">
          <label for="nombre_cajon">Nombre</label>
          <div class="position-relative has-icon-center">
            <input type="hidden" name="idG" id="idG" value="">
            <input type="text" placeholder="Ingrese nombre del cajón" class="form-control" id="nombre_cajon" name="nombre_cajon" required>
            <!-- <div class="form-control-position"><i class="icon-file2"></i></div> -->
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="ingresarCajon($('#idG').val());">Agregar</button>
      </div>
    </div>
  </div>