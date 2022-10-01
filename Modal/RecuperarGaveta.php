|<div class="modal fade" id="recupera_gaveta">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <label>Recuperar gaveta</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Hiddens -->
                <input type="hidden" id="id_gabeta">
                <input type="hidden" id="id_mecanico_a">
                <?php
                include 'Papelera.php';
                $pape = new Papelera();                
                $mecanicos = $pape->MecanicosDiscponibles();                
                ?>
                <input type="hidden" name="id_log_rec_G" id="id_log_rec_G" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
                <input type="hidden" id="nombreGav">
                <!-- Fin hiddens -->

                <div class="row justify-content-center">
                    <label style="font-weight: normal;" for="">Asigna esta gaveta a un mecánico:</label>
                </div>
                <div class="form-group">
                    <label>Mecanico</label>
                    <select class="custom-select" id="selectMecanico" name="selectMecanico">
                        <option selected>Elige un mecánico</option>
                        <?php
                        for ($i = 0; $i < count($mecanicos); $i++) {
                        ?>
                            <option value="<?php echo $mecanicos[$i]['id_mecanico'] ?>"><?php echo $mecanicos[$i]['nombre'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!-- <input type="hidden" name="random_herra" id="random_herra" value="">
                    <input type="hidden" name="idCajon_E" id="idCajon_E" value="">
                    <input type="hidden" name="nomC" id="nomC" value="">                     -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="recuperaGaveta()">Recuperar</button>
            </div>
        </div>
    </div>
</div>