|<div class="modal fade" id="captcha_mecanico_elimina">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <label for="asigPermiso">¿Está seguro de eliminar este mecánico?</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idMeca">      
        <input type="hidden" id="id_log_dltM" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
        <input type="hidden" id="nombre_log">
        <div class="row justify-content-center">
          <label style="font-weight: normal;">CAPTCHA: <label style="font-size: 18px;" id="lbl_mecanico_cap" for="captcha_meca_elimina"></label></label>
        </div>
        <div class="form-group">          
          <input type="hidden" name="random_meca_elimina" id="random_meca_elimina" value="">
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese el capctha generado..." class="form-control" id="captcha_meca_elimina" name="captcha_meca_elimina" required>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="verificaCaptchaMecanico();">Validar</button>
      </div>
    </div>
  </div>
</div>