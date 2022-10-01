var tableRgaveta;
var tableCajones;
var tableHerramientas;
var tableMecanicos;
init();

function init() {
    llenarTablaGavetas();
    llenarTablaCajones();
    llenarTablaHerramientas();
    llenarTablaMecanicos()
}

function llenarTablaGavetas() {
    tableMecanicos = $('#tablaRGavetas').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'papeleraControlador.php?operador=lista_gavetas',
        columns: [
            { data: 'nombre' },
            { data: 'descripcion' },
            { data: 'responsable' },
            { data: 'recuperar' }
        ]

    });
}

function llenarTablaCajones() {
    tableCajones = $('#tablaRCajones').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'papeleraControlador.php?operador=lista_cajones',
        columns: [
            { data: 'nombre' },
            { data: 'gaveta' },
            { data: 'ver' },
            { data: 'recuperar' }
        ]

    });
}

function llenarTablaHerramientas() {
    tableHerramientas = $('#tablaRHerramientas').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'papeleraControlador.php?operador=lista_herramientas',
        columns: [
            { data: 'nombre' },
            { data: 'descripcion' },
            { data: 'costo' },
            { data: 'piezas' },
            { data: 'anomalia' },
            { data: 'cajon' },
            { data: 'foto' },
            { data: 'recuperar' }
        ]
    });
}

function llenarTablaMecanicos() {
    tableMecanicos = $('#tablaRMecanicos').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'papeleraControlador.php?operador=lista_mecanicos',
        columns: [
            { data: 'nombre' },
            { data: 'area' },
            { data: 'foto' },
            { data: 'recuperar' }
        ]
    });
}

const formRecuperaGaveta = (id_gaveta,nombre) => {
    $('#id_gabeta').val(id_gaveta);
    $('#nombreGav').val(nombre);
}
const formRecuperaCajon = (id_cajon,nombre) => {
    $('#id_cajon').val(id_cajon);
    $('#nombreCaj').val(nombre);
}
const formRecuperaHerramienta = (id_herramienta,nombre) => {    
    $('#id_herramienta').val(id_herramienta);
    $('#nombreHer').val(nombre);
}

const onChangeMecanico = (id_meca) => {
    //alert(id_meca);
    // $('#id_mecanico').val(id_meca);
    listaGavetas(id_meca);    
    listaCajonesXMeca(id_meca);   
}

const onChangeGaveta = (id_gaveta) => {
    $('#id_gaveta').val($('#selectGabeta').val());
    mostrarCajones(id_gaveta);    
}

const onChangeCajon = () =>{
    $('#id_cajon').val($('#selectCajon').val());
}

const listaGavetas = (id_meca) => {
    $('#selectGabeta').empty()
    parametros = {
        "id_meca": id_meca
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'papeleraControlador.php?operador=gavetas_disponibles',
        beforeSend: function () { },
        success: function (response) {            
            if (JSON.parse(response).length == 0) {                
                $('#selectGabeta').prepend("<option value='0'>No disponible</option>");
                $('#selectCajon').prepend("<option value='0'>No disponible</option>");
            } else {
                //$.each(JSON.parse)                
                $.each(JSON.parse(response), function (id, name) {                    
                    $('#selectGabeta').prepend(`<option value="${name.id_gabeta}">${name.nombre} </option>`);
                    //$('#selectCajon').prepend(`<option value="${name.id_cajon}">${name.nombreC} </option>`)
                });
                $('#id_gaveta').val($('#selectGabeta').val());                
            }
        }
    });

}

const listaCajonesXMeca = (id_meca) => {
    $('#selectCajon').empty()
    parametros = {
        "id_meca": id_meca
    }

    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'papeleraControlador.php?operador=cajones_disponibles_x_meca',
        beforeSend: function () { },
        success: function (response) {            
            if (JSON.parse(response).length == 0) {                   
                $('#selectCajon').prepend("<option value='0'>No disponible</option>");
            } else {
                //$.each(JSON.parse)                
                $.each(JSON.parse(response), function (id, name) {                    
                    $('#selectCajon').prepend(`<option value="${name.id_cajon}">${name.nombreC} </option>`)
                });
                $('#id_cajon').val($('#selectCajon').val());
            }
        }
    });
}

const mostrarCajones = (id_gaveta) => {
    //alert(id_meca);    
    $('#selectCajon').empty()
    parametros = {
        "id_gaveta": id_gaveta
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'papeleraControlador.php?operador=cajones_disponibles',
        beforeSend: function () { },
        success: function (response) {            
            if (JSON.parse(response).length == 0) {
                $('#selectCajon').prepend("<option value='0'>No disponible</option>");                
            } else {
                $.each(JSON.parse(response), function (id, name) {
                    $('#selectCajon').prepend("<option value='" + name.id_cajon + "'>" + name.nombre + "</option>");                    
                });
                $('#id_cajon').val($('#selectCajon').val());
            }
        }
    });
}

const mostrarIDGaveta = () => {
    $('#id_gaveta').val($('#selectGabeta').val());
}

const mostrarIDCajon = () => {
    $('#id_cajon').val($('#selectCajon').val());
}



const recuperaGaveta = () => {
    id_gaveta = $('#id_gabeta').val();
    id_log = $('#id_log_rec_G').val();
    nom = $('#nombreGav').val();
    if ($('#selectMecanico').val() != 'Elige un mecánico') {
        id_meca = $('#selectMecanico').val();
        parametros = {
            "id_gaveta": id_gaveta,
            "id_meca": id_meca,
            "id_log": id_log,
            "nom":nom
        }
        $.ajax({
            data: parametros,
            url: 'papeleraControlador.php?operador=recupera_gaveta',
            type: 'POST',
            beforeSend: function () { },
            success: function (response) {
                var response = response.trim();
                if (response == "success") {
                    $('#recupera_gaveta').modal('hide');
                    toastr.success("Correcto", "Gaveta recuperada exitosamente");
                    $("#tablaRGavetas").dataTable().fnDestroy();
                    llenarTablaGavetas();
                } else {
                    toastr.error("No se pudo recuperar gaveta", "¡Error!");
                }
            },
            error: function () {
                toastr.error("Algo salió mal", "Error!");
            }
        })

    } else {
        toastr.warning("No se ha asignado un mecánico", "Asigna un mecánico");
    }
}

const recuperaCajon = () => {
    id_cajon = $('#id_cajon').val();
    id_gaveta = $('#id_gaveta').val();
    console.log(id_cajon + " " + id_gaveta );
    id_log = $('#id_log_rec_C').val();
    nom = $('#nombreCaj').val();
    if ($('#selectMecanico').val() != 'Elige un mecánico') {
        if ($('#selectGabeta').val() == "0") {
            toastr.warning("No se ha asignado una gaveta", "Asigna un gaveta");
        } else {
            parametros={
                'id_cajon':id_cajon,
                'id_gaveta':id_gaveta,
                'id_log': id_log,
                'nom': nom
            }
            $.ajax({
                data: parametros,
                url: 'papeleraControlador.php?operador=recupera_cajon',
                type: 'POST',
                beforeSend: function () { },
                success: function (response) {
                    var response = response.trim();
                    if (response == "success") {
                        $('#recupera_cajon').modal('hide');
                        toastr.success("Correcto", "Gaveta recuperada exitosamente");
                        $("#tablaRCajones").dataTable().fnDestroy();
                        llenarTablaCajones();
                    } else {
                        toastr.error("No se pudo recuperar cajon", "¡Error!");
                    }
                },
                error: function () {
                    toastr.error("Algo salió mal", "Error!");
                }
            })
            //toastr.success("Correcto", "Gaveta recuperada exitosamente");
        }
    } else {
        toastr.warning("No se ha asignado un mecánico", "Asigna un mecánico");
    }
}

const recuperaHerramienta = () => {
    id_herramienta = $('#id_herramienta').val();
    id_gaveta = $('#id_gaveta').val();
    id_cajon = $('#id_cajon').val();
    id_log = $('#id_log_rec_H').val();
    nom = $('#nombreHer').val();    
    if ($('#selectMecanico').val() != 'Elige un mecánico') {
        if ($('#selectGabeta').val() == "0") {
            toastr.warning("No se ha asignado una gaveta", "Asigna un gaveta");
        } else if($('#selectCajon').val() == "0") {                       
            toastr.warning("No se ha asignado un cajón", "Asigna un cajó");
        }else{
            parametros={
                'id_herramienta':id_herramienta,                
                'id_cajon':id_cajon,
                'id_log': id_log,
                'nom': nom
            }
            $.ajax({
                data: parametros,
                url: 'papeleraControlador.php?operador=recupera_herramienta',
                type: 'POST',
                beforeSend: function () { },
                success: function (response) {
                    var response = response.trim();
                    if (response == "success") {
                        $('#recupera_herramienta').modal('hide');
                        toastr.success("Correcto", "Herramienta recuperada exitosamente");
                        $("#tablaRHerramientas").dataTable().fnDestroy();
                        llenarTablaHerramientas();
                    } else {
                        toastr.error("No se pudo recuperar herramienta", "¡Error!");
                    }
                },
                error: function () {
                    toastr.error("Algo salió mal", "Error!");
                }
            })
        }
    } else {
        toastr.warning("No se ha asignado un mecánico", "Asigna un mecánico");
    }
}

const recuperaMecanico = (id_meca,nombre) => {
    parametros = {        
        "id_meca": id_meca,
        "nom": nombre
    }
    $.ajax({
        data: parametros,
        url: 'papeleraControlador.php?operador=recupera_mecanico',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {                
                toastr.success("Correcto", "Mecánico recuperado exitosamente");
                $("#tablaRMecanicos").dataTable().fnDestroy();
                llenarTablaMecanicos();
            } else {
                toastr.error("No se pudo recuperar mecánico", "¡Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })

}

const obtenerHerramientasCajon = (id_cajon, nombreCajon) => {
    $('#nmcj').val(nombreCajon);
    $('#temna').val(nombreCajon);
    $('#id_cajon_elimina').val(id_cajon);
    //herramientas = $('#tablaHerramientas').empty();
    $divHerramientas = $('#divherramientasC').empty();
    $divHerramientas.append('<input type="hidden" id="id_cajonm" value="' + id_cajon + '">' +
        '<input type="hidden" id="nc" value="' + nombreCajon + '">');
    document.getElementById("textocajon").innerHTML = nombreCajon;
    $('#nombre_cajon').val(nombreCajon);
    parametros = {
        "id_cajon": id_cajon,
        "nombre": nombreCajon
    }
    $("#tablaHerramientasC").dataTable().fnDestroy();
    tableHerramientas = $('#tablaHerramientasC').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: {
            url: 'papeleraControlador.php?operador=consultar_Herramientas_Cajon',
            data: parametros,
            type: 'post'
        },
        columns: [
            { data: 'nombre' },
            { data: 'descripcion' },
            { data: 'costo' },
            { data: 'piezas' },
            { data: 'anomalia' },
            { data: 'foto' },           
        ]

    });
}