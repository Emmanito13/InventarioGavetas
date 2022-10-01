<div class="modal fade" id="nuevo_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="registrarUser">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" class="form-control" placeholder="Nombre completo" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="position-relative has-icon-left">
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passsword">Password</label>
                        <div class="position-relative has-icon-left">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passsword">Ingrese nuevamente el password</label>
                        <div class="position-relative has-icon-left">
                            <input type="password" class="form-control" placeholder="Password" id="password2" name="password2">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="btn-file">
                            Foto del usuario
                            <input type="file" name="fotoUsu" id="fotoUsu" required class="form-control" accept="image/*" onchange="VistaPreviaNUsuario();" />
                            <br><img id="imgPerfil" />
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                <button type="button" class="btn btn-primary" onclick="RegistrarUsuario();">Registrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->