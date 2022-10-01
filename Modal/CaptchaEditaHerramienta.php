|<div class="modal fade" id="captcha_herramienta">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <label for="asigPermiso">Editar herramienta</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idHerra">
        <input type="hidden" class="form-control" id="opc" name="opc">
        <input type="hidden" class="form-control" id="hih" name="hih">
        <!-- <input  id="claveU" type="password" class="form-control">          -->
        <div class="row justify-content-center">
          <label style="font-weight: normal;" for="captcha_cajon">CAPTCHA: <label style="font-size: 18px;" id="lbl_herra_cajon" for="captcha_herra"></label></label>
        </div>
        <div class="form-group">          
          <input type="hidden" name="random_herra" id="random_herra" value="">
          <input type="hidden" name="idCajon_E" id="idCajon_E" value="">
          <input type="hidden" name="nomC" id="nomC" value="">
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese el capctha generado..." class="form-control" id="captcha_herra" name="captcha_herra" required>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="editarHerramienta($('#idCajon_E').val(),$('#nomC').val())">Validar</button>
      </div>
    </div>
  </div>
</div>