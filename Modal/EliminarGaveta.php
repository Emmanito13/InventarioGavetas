<div class="modal fade" id="eliminar_gabeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="eliminar_gabeta"></h5>
        <label for="asigPermiso">¿Está seguro de eliminar esta gaveta?</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <label style="font-weight: normal;" for="captcha">CAPTCHA: <label style="font-size: 18px;" id="lbl_cap" for="captcha"></label></label>
        </div>
        <div class="form-group">
          <input type="hidden" name="id_gaveta" id="id_gaveta" value="">
          <input type="hidden" name="id_log_dtl_G" id="id_log_dtl_G" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
          <input type="hidden" name="nombreG" id="nombreG" value="">
          <input type="hidden" name="random" id="random" value="">
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese el capctha generado..." class="form-control" id="captcha" name="captcha" required>            
          </div>
        </div>
        <!-- <input type="hidden" id="idHerra" value="20">
        <input type="hidden" class="form-control" id="opc" name="opc" value="2">
        <input type="hidden" class="form-control" id="hih" name="hih" value="dados">
        <input id="claveU" type="password" class="form-control"> -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="EliminarGabeta($('#id_gaveta').val());">Eliminar</button>
      </div>
    </div>
  </div>
</div>