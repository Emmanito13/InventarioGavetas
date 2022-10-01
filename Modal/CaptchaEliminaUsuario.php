|<div class="modal fade" id="captchaEliminaUsuario">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <label for="asigPermiso">¿Está seguro de eliminar este usuario?</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idUser">          
        <input type="hidden" id="nom_eli_log">
        <div class="row justify-content-center">
          <label style="font-weight: normal;">CAPTCHA: <label style="font-size: 18px;" id="lbl_user_cap" for="captcha_user_elimina"></label></label>
        </div>
        <div class="form-group">          
          <input type="hidden" name="random_user_elimina" id="random_user_elimina" value="">
          <div class="position-relative has-icon-center">
            <input type="text" placeholder="Ingrese el capctha generado..." class="form-control" id="captcha_user_elimina" name="captcha_user_elimina" required>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="alertaEliminaUsuario($('#idUser').val(),$('#nom_eli_log').val());">Validar</button>
      </div>
    </div>
  </div>
</div>