<div class="modal fade" id="nuevo_mecanico">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar mecánico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formNuevoMecanico">
                    <input type="hidden" name="id_log_newM" id="id_log_newM" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
                    <div class="form-group">
                        <label for="nombreH">Nombre</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" placeholder="Ingresa Nombre" class="form-control" id="nombreM" name="nombreM" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Área</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" placeholder="Ingresa Descripción" class="form-control" id="area" name="area">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="btn-file">
                            Selecciona Foto de Herramienta
                            <input type="file" name="foto_mecanico" id="foto_mecanico" class="form-control" accept="image/*" onchange="VistaPreviaMecanico()" />
                            <br><img id="imgMecanico" />
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="registrarMecanico();">Registrar</button>
            </div>
        </div>
    </div>
</div>