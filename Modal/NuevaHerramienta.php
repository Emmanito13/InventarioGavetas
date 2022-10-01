<div class="modal fade" id="nueva_herramienta">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nueva Herramienta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="regHerramienta">
        <input type="hidden" name="id_log_new_H" id="id_log_new_H" value="<?php echo $_SESSION["user"]["idusuario"] ?>">
          <div class="form-group">
            <label for="nombreH">Nombre</label>
            <div class="position-relative has-icon-left">
              <input type="hidden" class="form-control" id="cajon" name="cajon">
              <input type="text" placeholder="Ingresa Nombre" class="form-control" id="nombreH" name="nombreH" required>
              <div class="form-control-position"><i class="icon-file2"></i></div>
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <div class="position-relative has-icon-left">
              <input type="text" placeholder="Ingresa Descripción" class="form-control" id="descripcionH" name="descripcionH" required>
              <div class="form-control-position"><i class="icon-file2"></i></div>
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">PZ</label>
            <div class="position-relative has-icon-left">
              <input type="number" min="1" placeholder="Ingresa Cantidad" class="form-control" id="pz" name="pz" required>
              <div class="form-control-position"><i class="icon-file2"></i></div>
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">Costo</label>
            <div class="position-relative has-icon-left">
              <input type="number" min="1" placeholder="Ingresa Descripción" class="form-control" id="costo" name="costo" required>
              <div class="form-control-position"><i class="icon-file2"></i></div>
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">Anomalia</label>
            <div class="position-relative has-icon-left">
              <input type="text" placeholder="Ingrese Anomalia" class="form-control" id="anomalia" name="anomalia" required>
              <div class="form-control-position"><i class="icon-file2"></i></div>
            </div>
          </div>
          <div class="form-group">
            <span class="btn-file">
              Selecciona Foto de Herramienta
              <input type="file" name="foto-herramienta" id="filenuevah" required class="form-control" accept="image/*" onchange="VistaPreviaHerramienta();" />
              <br><img id="imgHerramientaNueva" />
            </span>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </form>
        <button type="button" class="btn btn-primary" onclick="RegistrarHerramienta();">Registrar</button>
      </div>
    </div>
  </div>
</div>