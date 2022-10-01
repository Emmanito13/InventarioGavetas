init();

function init() {
    llenarTablaBitacora();
}

function llenarTablaBitacora() {
    tablaBitacora = $('#tablaBitacora').dataTable({
        pageLength: 25,
        responsive: true,
        processing: true,
        ajax: 'UsuarioControlador.php?operador=bitacora',
        columns: [
            { data: 'usuario' },
            { data: 'accion' },
            { data: 'fecha' },
            { data: 'hora' },            
        ]
    });
}

