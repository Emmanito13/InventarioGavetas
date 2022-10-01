<div class="modal fade" style="overflow-y: auto;" id="editar_herramienta" tabindex="-1" role="dialog" aria-labelledby="editar_herramienta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titulo_editar">Nuevas Herramientas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-lg">
        <form action="" id="edtHerramienta">
            <div class="form-group">
              <label for="nombreH">Nombre</label>
              <div class="position-relative has-icon-left">
                <input type="hidden" id="id_cajon_E">
                <input type="hidden" id="nc_E">
                <input type="text" name="id_log_upt_H" id="id_log_upt_H" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
                <input type="hidden" class="form-control" id="idHerredt" name="idHerredt" required>
                <input type="text" class="form-control" id="edtnombre" name="edtnombre" required>
                <div class="form-control-position"><i class="icon-file2"></i></div>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <div class="position-relative has-icon-left">
                <input type="text" class="form-control" id="edtdescripcion" name="edtdescripcion" required>
                <div class="form-control-position"><i class="icon-file2"></i></div>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">PZ</label>
              <div class="position-relative has-icon-left">
                <input type="number" class="form-control" id="edtpz" name="edtpz" required>
                <div class="form-control-position"><i class="icon-file2"></i></div>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">Costo</label>
              <div class="position-relative has-icon-left">
                <input type="number" class="form-control" id="edtcosto" name="edtcosto" required>
                <div class="form-control-position"><i class="icon-file2"></i></div>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">Anomalia</label>
              <div class="position-relative has-icon-left">
                <input type="text" class="form-control" id="edtanomalia" name="edtanomalia" required>
                <div class="form-control-position"><i class="icon-file2"></i></div>
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="nom_file" id="nom_file" value="">
              <span class="btn-file">
                Selecciona una nueva Foto
                <input type="file" name="filedt" id="filedt" required class="form-control" accept="image/*" onchange="VistaPreviaHerramientaEdt();" />
                <br><img id="imgHerramientaedt" />
              </span>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="ModificarHerramienta($('#id_cajon_E').val(),$('#nc_E').val())">Actualizar</button>
      </div>
    </div>
  </div>
</div>
