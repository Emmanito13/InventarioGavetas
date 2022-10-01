<div class="modal fade" id="editar_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar datos del usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formEditaUsuario">
                    <input type="hidden" name="id_usu_E" id="id_usu_E">
                    <input type="hidden" name="name_file" id="name_file">
                    <div class="form-group">
                        <label for="nombreH">Nombre</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" placeholder="Ingresa Nombre" class="form-control" id="nombreUE" name="nombreUE" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Email</label>
                        <div class="position-relative has-icon-left">
                            <input type="email" placeholder="Ingresa email" class="form-control" id="emailUE" name="emailUE">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="btn-file">
                            Selecciona Foto de Usuario
                            <input type="file" name="foto_usuario_e" id="foto_usuario_e" class="form-control" accept="image/*" onchange="VistaPreviaEUsuario()" />
                            <br><img id="imgUsuario_E" />
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editarUsuario();">Registrar</button>
            </div>
        </div>
    </div>
</div>