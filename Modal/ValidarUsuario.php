<div class="modal fade" id="validar_usuario">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <label for="asigPermiso">Clave validar Usuario</label>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idHerra">
          <input type="hidden" class="form-control" id="opc" name="opc">
          <input type="hidden" class="form-control" id="hih" name="hih">
          <input  id="claveU" type="password" class="form-control">         
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="ValidarUsuario();">Validar</button>
        </div>
    </div>
  </div>
</div>