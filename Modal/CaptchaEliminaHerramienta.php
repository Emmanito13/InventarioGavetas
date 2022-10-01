|<div class="modal fade" id="captcha_herramienta_elimina">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <label for="asigPermiso">¿Está seguro de eliminar esta herramienta?</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idHerra_e">
        <input type="hidden" class="form-control" id="opc" name="opc">
        <input type="hidden" class="form-control" id="hih" name="hih">
        <input type="hidden" name="id_log_dlt_G" id="id_log_dlt_G" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
        <!-- <input  id="claveU" type="password" class="form-control">          -->
        <div class="row justify-content-center">
          <label style="font-weight: normal;" for="captcha_cajon">CAPTCHA: <label style="font-size: 18px;" id="lbl_herra_cajon_elimina" for="captcha_herra_elimina"></label></label>
        </div>
        <div class="form-group">          
          <input type="hidden" name="random_herra_elimina" id="random_herra_elimina" value="">
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese el capctha generado..." class="form-control" id="captcha_herra_elimina" name="captcha_herra_elimina" required>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="eliminarHerramienta();">Validar</button>
      </div>
    </div>
  </div>
</div>