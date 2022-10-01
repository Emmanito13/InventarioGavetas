|<div class="modal fade" id="recupera_cajon">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <label>Recuperar Cajon</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Hiddens -->
                <input type="hidden" id="id_cajon">
                <input type="hidden" id="id_gaveta">
                <?php
                include 'Papelera.php';
                $pape = new Papelera();
                $mecanicos = $pape->MecanicosDiscponibles();
                //$gavetas = $pape->GavetasDiscponibles();
                ?>
                <input type="hidden" name="id_log_rec_C" id="id_log_rec_C" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
                <input type="hidden" id="nombreCaj">
                <!-- Fin hiddens -->

                <div class="row justify-content-center">
                    <label style="font-weight: normal;" for="">Asigna este cajón a un mecánico:</label>
                </div>
                <div class="form-group">
                    <label>Mecanico</label>
                    <select class="custom-select" id="selectMecanico" name="selectMecanico" onchange="mostarGavetas($('#selectMecanico').val())">
                        <option selected>Elige un mecánico</option>
                        <?php
                        for ($i = 0; $i < count($mecanicos); $i++) {
                        ?>
                            <option value="<?php echo $mecanicos[$i]['id_mecanico'] ?>"><?php echo $mecanicos[$i]['nombre'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="row justify-content-center">
                    <label style="font-weight: normal;" for="">Asigna este cajón a una gaveta:</label>
                </div>
                <div class="form-group">
                    <label>Gaveta</label>
                    <select class="custom-select" id="selectGabeta" name="selectGabeta" onchange="mostrarIDGaveta()">
                        <option selected>Elige una gaveta</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="recuperaCajon()">Recuperar</button>
            </div>
        </div>
    </div>
</div>