<div class="modal fade" id="eliminar_cajon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="eliminar_cajon"></h5>
        <label for="asigPermiso">¿Está seguro de eliminar este cajon?</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <label style="font-weight: normal;" for="captcha_cajon">CAPTCHA: <label style="font-size: 18px;" id="lbl_cap_cajon" for="captcha_cajon"></label></label>
        </div>
        <div class="form-group">
          <input type="hidden" name="id_cajon_elimina" id="id_cajon_elimina" value="">
          <input type="hidden" name="random_cajon" id="random_cajon" value="">
          <input type="hidden" name="id_log_dlt_C" id="id_log_dlt_C" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
          <input type="hidden" name="nombreCa" id="nombreCa">
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese el capctha generado..." class="form-control" id="captcha_cajon" name="captcha_cajon" required>            
          </div>
        </div>
        <!-- <input type="hidden" id="idHerra" value="20">
        <input type="hidden" class="form-control" id="opc" name="opc" value="2">
        <input type="hidden" class="form-control" id="hih" name="hih" value="dados">
        <input id="claveU" type="password" class="form-control"> -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="EliminarCajon($('#id_cajon_elimina').val());">Eliminar</button>
      </div>
    </div>
  </div>
</div>