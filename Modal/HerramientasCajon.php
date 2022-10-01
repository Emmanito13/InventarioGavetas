<div class="modal fade" style="overflow-y: auto;" id="herramienta_cajon" tabindex="-1" role="dialog" aria-labelledby="cajon_gabeta" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="float-left">
                    <div id="nomc">

                    </div>
                    <h2 class="text-center" class="fw-bold" id="textocajon" onclick="habilitarNC();"></h2>
                    <input type="hidden" id="ideme">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="float-right">
                            <input type="hidden" id="nmcj">
                            <!-- <input type="text" id="id_gabeta_c"> -->
                            <!-- <input type="image" src="imagenes/lapiz.png" width="18px">-->
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar_cajon" onclick="captchaEliminaCajon($('#id_cajonm').val())"> <i class="fas fa-trash-alt"> </i> </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#nueva_herramienta" onclick="ObtenerIdCajon($('#id_cajonm').val())"> <i class="fas fa-plus"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row" id="divherramientasC">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tablaHerramientasC" class="table table-bordered display nowrap" cellspacing = "0" width="100%" >
                                <thead>
                                    <tr>                                        
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>COSTO</th>
                                        <th>PIEZAS</th>
                                        <th>ANOMALIA</th>
                                        <th>FOTO</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>COSTO</th>
                                        <th>PIEZAS</th>
                                        <th>ANOMALIA</th>
                                        <th>FOTO</th>                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" onclick="AsignarPermiso();">Registrar</button>-->
            </div>
        </div>
    </div>
</div>