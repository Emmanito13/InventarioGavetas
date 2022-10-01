<div class="modal fade" id="epass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cambiar contraseña:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_usu" id="id_usu">          
                <input type="hidden" name="nom" id="nom">
                <div class="form-group">
                    <label for="nombre">Contraseña nueva:</label>
                    <div class="position-relative has-icon-left">
                        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Confirmar contraseña nueva:</label>
                    <div class="position-relative has-icon-left">
                        <input type="password" class="form-control" placeholder="Password" id="pass2" name="pass2">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="ePass();">Cambiar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->