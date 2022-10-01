<div class="modal fade" id="editar_mecanico">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar datos mecánico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formEditaMecanico">
                    <input type="hidden" name="id_meca_E" id="id_meca_E">
                    <input type="hidden" name="name_file" id="name_file">
                    <input type="hidden" name="id_log_uptM" id="id_log_uptM" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
                    <div class="form-group">
                        <label for="nombreH">Nombre</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" placeholder="Ingresa Nombre" class="form-control" id="nombreME" name="nombreME" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Área</label>
                        <div class="position-relative has-icon-left">
                            <input type="text" placeholder="Ingresa Descripción" class="form-control" id="areaME" name="areaME">
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="btn-file">
                            Selecciona Foto de Herramienta
                            <input type="file" name="foto_mecanico_e" id="foto_mecanico_e" class="form-control" accept="image/*" onchange="VistaPreviaMecanicoE()" />
                            <br><img id="imgMecanico_E" />
                        </span>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="editarMecanico();">Registrar</button>
            </div>
        </div>
    </div>
</div>