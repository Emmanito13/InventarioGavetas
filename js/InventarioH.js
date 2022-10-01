var tableMecanicos;
init();

function init() {
    //LlenarTablaInventario();
    llenarTablaMecanicos();
    //ConsultarMecanicos();
    ConsultarGabetas();
    //LlenarTablaInventario2();
}

function llenarTablaMecanicos() {
    tableMecanicos = $('#tablaMecanicos').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'InventarioHControlador.php?operador=lista_mecanicos',
        columns: [
            { data: 'nombre' },
            { data: 'area' },
            { data: 'foto' },
            { data: 'gaveta' },
            { data: 'editar' },
            { data: 'eliminar' }

        ]

    });
}

const gavetas = (id) => {
    window.location = 'InventarioInterno.php?id=' + id;
}

function ConsultarMecanicos() {
    parametros = {
        "id": 1
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'InventarioHControlador.php?operador=consultar_mecanicos',
        beforeSend: function () { },
        success: function (response) {
            var selectmec = $('#mecanico');
            $.each(JSON.parse(response), function (id, name) {
                selectmec.append('<option value=' + name.idusuario + '>' + name.nombre + '</option>');
            });

            var selectmec2 = $('#mecanico2');
            $.each(JSON.parse(response), function (id, name) {
                selectmec2.append('<option value=' + name.idusuario + '>' + name.nombre + '</option>');
            });
        }
    });
}

function RegistrarGabeta() {
    nombre = $('#nombre').val();
    descripcion = $('#descripciong').val();
    cantidad = $('#cantidadc').val();
    mecanico = $('#mecanico').val();
    id_log = $('#id_log_newG').val();

    parametros = {
        "nombre": nombre,
        "descripcion": descripcion,
        "cantidad": cantidad,
        "mecanico": mecanico,
        "id_log": id_log
    }
    $.ajax({
        data: parametros,
        url: 'InventarioHControlador.php?operador=registrar_gabeta',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {
                toastr.success("Correctamente", "!Agregada!");
                $("#nueva_gabeta").modal('hide');
                ConsultarGabetas();
                $('#nombre').val("");
                $('#descripciong').val("");
                $('#cantidadc').val("");
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == "exceeded") {
                toastr.warning("Por favor verique el numero de cajones, no se puede registrar más de 10", "Numero de cajones excesivo");
            } else {
                alert(response);
                toastr.error("No se pudo guardar", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

function ConsultarGabetas() {
    id = $('#id').val();
    gabetas = $('#divgabetas').empty();
    parametros = {
        "id": 1
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'InventarioHControlador.php?operador=consultar_gabetas&id=' + id,
        beforeSend: function () { },
        success: function (response) {
            $.each(JSON.parse(response), function (id, name) {
                gabetas.append('<div class="col-md-4">' +
                    '<div class="card">' +
                    '<div class="card-header">' +
                    '<div class="row">' +
                    '<div class="col-12">' +
                    '<div class="small-box bg-danger">' +
                    '<div class="inner row" >' +
                    '<div class="col-12 text-center">' +
                    '<div class="container"><h3>' + name.nombre + '</h3></div>' +
                    '<div class="stilo" x id="parrafos"> <center> ' + name.descripcion + '</center></div>' +
                    '<input type="hidden" name="id_gaveta" id="id_gaveta_' + name.id_gabeta + '" value="' + name.id_gabeta + '">' +
                    //'<button type="button" class="btn btn-danger" data-toggle="modal" onclick="captchaEliminaGaveta(' + name.id_gabeta + ')" data-target="#eliminar_gabeta"><i class="fas fa-trash-alt"></i></button>' +
                    `<button type="button" class="btn btn-danger" data-toggle="modal" onclick="captchaEliminaGaveta(${name.id_gabeta},'${name.nombre}')" data-target="#eliminar_gabeta"><i class="fas fa-trash-alt"></i></button>`+
                    '<button type="button" class="btn btn-secondary" data-toggle="modal" onclick="agregaIdGaveta(' + name.id_gabeta + ')" data-target="#agregar_cajon"><i class="fas fa-plus"></i></button>' +
                    `<button type="button" class="btn btn-dark"  data-toggle="modal" onclick="agregaFormEditar(${name.id_gabeta},'${name.nombre}','${name.descripcion}')" data-target="#editar_gabeta"><i class="fas fa-pen"> </i></button>` +
                    // '<button type="button" class="btn btn-dark"  data-toggle="modal" onclick="agregaFormEditar(' + `${name.id_gabeta},${name.nombre},${name.descripcion}` + ')" data-target="#editar_gabeta"><i class="fas fa-pen"> </i></button>' +
                    '<a href="Modal/PdfGabeta.php?id=' + name.id_gabeta + '&nom=' + name.nombre + '&desc=' + name.descripcion + '&resp=' + name.responsable + '" onclick="imprimeGavetaPDF(' + name.id_gabeta + ')" class="btn btn-light"> <i class="fas fa-file-download" aria-hidden="true"></i></a>' +
                    '</div>' +

                    '<div class="icon">' +
                    '<i class="fas fa-cabinet-filing"></i>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="row" id="cajonesgabeta' + name.id_gabeta + '">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                ConsultarCajones(name.id_gabeta);
            });
        }
    });
}



const agregaIdGaveta = (idGaveta) => {
    $('#idG').val(idGaveta);
}

const agregaFormEditar = (id, nombre, desc) => {
    $('#idG').val(id);
    $('#nombre_g').val(nombre);
    $('#descripcion_g').val(desc);
}

const editarGaveta = (idGaveta) => {
    idG = idGaveta;
    nombreN = $('#nombre_g').val();
    descripcionN = $('#descripcion_g').val();
    id_log = $('#id_log_upt_G').val();
    parametros = {
        "idG": idG,
        "nombreN": nombreN,
        "descripcionN": descripcionN,
        "id_log":id_log
    }

    $.ajax({
        data: parametros,
        url: 'InventarioHControlador.php?operador=editar_gaveta',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {
                toastr.success("Correcto", "Gaveta actualizada exitosamente");
                $("#editar_gabeta").modal('hide');
                ConsultarGabetas();
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else {
                toastr.error("No se pudo guardar los cambios", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })

}


const ingresarCajon = (idGaveta) => {

    idG = idGaveta;
    nombre_cajon = $('#nombre_cajon').val();
    id_log = $('#id_log_newC').val();

    parametros = {
        "idG": idG,
        "nombre_cajon": nombre_cajon,
        "id_log": id_log
    }
    $.ajax({
        data: parametros,
        url: 'InventarioHControlador.php?operador=registrar_cajon',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {
                toastr.success("Correcto", "Cajón agregado exitosamente");
                $("#agregar_cajon").modal('hide');
                ConsultarGabetas();
                $('#nombre_cajon').val("");
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else {
                toastr.error("No se pudo guardar cajon", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })

}



function ConsultarCajones(id_gabeta) {
    var cajon = $('#cajonesgabeta' + id_gabeta);//cajon = $('#cajonesgabeta'+id_gabeta).empty();
    //$('#ideme').val(idmecanico);

    parametros = {
        "id_gabeta": id_gabeta
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'InventarioHControlador.php?operador=consultar_cajones',
        beforeSend: function () { },
        success: function (response) {
            $.each(JSON.parse(response), function (id, name) {
                a = id + 1;
                if (a % 2 == 0) {
                    salto = '<br>';
                } else {
                    salto = ' ';
                }
                cajon.append('<div class="col-md-6">' +
                    '<div class="row">' +
                    '<div class="col">' +
                    '<button class="btn1 btn-secondary btn-lg btn-block"  data-toggle="modal" data-target="#cajon_gabeta" onclick="obtenerHerramientasCajon(' + name.id_cajon + ', ' + "'" + name.nombre + "'" + ')">' + name.nombre + '</button>' +
                    '</div>' +
                    '</div><br>' +
                    '</div>' + salto);
            });
        }
    });
}

const obtenerHerramientasCajon = (id_cajon, nombreCajon) => {
    $('#nmcj').val(nombreCajon);
    $('#temna').val(nombreCajon);
    $('#id_cajon_elimina').val(id_cajon);
    //herramientas = $('#tablaHerramientas').empty();
    $divHerramientas = $('#divherramientas').empty();
    $divHerramientas.append('<input type="hidden" id="id_cajonm" value="' + id_cajon + '">' +
        '<input type="hidden" id="nc" value="' + nombreCajon + '">');
    document.getElementById("textocajon").innerHTML = nombreCajon;
    $('#nombre_cajon').val(nombreCajon);
    parametros = {
        "id_cajon": id_cajon,
        "nombre": nombreCajon
    }
    $("#tablaHerramientas").dataTable().fnDestroy();
    tableHerramientas = $('#tablaHerramientas').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: {
            url: 'InventarioHControlador.php?operador=consultar_Herramientas_Cajon',
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
            { data: 'editar' },
            { data: 'eliminar' }
        ]

    });
}


function ObtenerHerramientasCajon(id_cajon, nombreCajon) {
    $('#nmcj').val(nombreCajon);
    $('#temna').val(nombreCajon);
    $('#id_cajon_elimina').val(id_cajon);
    //console.log("id_cajon" + id_cajon); 
    herramientas = $('#divherramientas').empty();
    document.getElementById("textocajon").innerHTML = nombreCajon;
    $('#nombre_cajon').val(nombreCajon);
    idmecanico = $('#ideme').val();
    parametros = {
        "id_cajon": id_cajon
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'InventarioHControlador.php?operador=consultar_herramientas_cajon',
        beforeSend: function () { },
        success: function (response) {
            alert(response);
            herramientas.append('<input type="hidden" id="id_cajonm" value="' + id_cajon + '">' +
                '<input type="hidden" id="nc" value="' + nombreCajon + '">');
            $.each(JSON.parse(response), function (id, name) {
                if (name.inventario == 'alta') {
                    borde = '';
                    // marca = '<input type="checkbox"  id="cbxinventario" checked onclick="MarcarBaja(' + name.idHerramienta + ',' + id_cajon + ',' + "'" + nombreCajon + "'" + ')">';
                    cobrar = '';
                } else {
                    // if (name.estatus_cobro == 'pendiente') {
                    //     cobrar = '<button class="btn btn-danger btn-sm" onclick="CobrarHerramienta(' + idmecanico + ', ' + name.idHerramienta + ', ' + "'" + name.nombre + "'" + ', ' + name.costo + ', ' + id_cajon + ',' + "'" + nombreCajon + "'" + ')"> Cobrar </button>';
                    // } else {
                    //     cobrar = ' ';
                    // }
                    borde = 'id="one"';
                    marca = ' ';

                }
                herramientas.append('<div class="col-sm-3" ' + borde + '>' +
                    '<div class="row">' +
                    '<div class="col">' +

                    '</div>' +
                    '<div class="col">' +
                    '<a data-toggle="modal" data-target="#detalle_herramienta" onclick="DetalleHerramienta(' + name.idHerramienta + ',' + "'" + name.nombre + "'" + ')"><img src="imagenes/Herramientas/' + name.foto + '" style="height:100px; width:105px;" alt="Product Image"></a>' +
                    '</div>' +
                    '<div class="col" id="cbxinventario">' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col">' +

                    '</div>' +
                    '<div class="col">' +
                    '<p id="parrafos">' + name.nombre + '</p>' +
                    '</div>' +
                    '<div class="col">' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            });
        }
    });
}


function DetalleHerramienta(idHerramienta, nombreHerramienta) {
    document.getElementById("textoNomH").innerHTML = nombreHerramienta;
    detalleherramienta = $('#divdetalleherramientas').empty();
    parametros = {
        "idHerramienta": idHerramienta
    }
    $.ajax({
        data: parametros,
        type: 'POST',
        url: 'InventarioHControlador.php?operador=consultar_detalle_herramienta',
        beforeSend: function () { },
        success: function (response) {
            $.each(JSON.parse(response), function (id, name) {
                if (name.piezas > 1) {
                    unidad = name.piezas + ' pzs';
                } else {
                    unidad = name.piezas + ' pz';
                }
                detalleherramienta.append('<div class="col">' +
                    '<div class="row">' +
                    '<div class="col">' +
                    '<input type="hidden" id="id_h" value="' + idHerramienta + '">' +
                    '</div>' +
                    '<div class="col">' +
                    '<img src="imagenes/Herramientas/' + name.foto + '" style="height:240px; width:245px;" alt="Product Image">' +
                    '</div>' +
                    '<div class="col">' +
                    '</div>' +
                    '</div>' +


                    '<div class="row">' +
                    '<div class="col">' +
                    '<div class="float-right"> <p>' + unidad + '</p></div>' +
                    '</div>' +
                    '<div class="col">' +
                    '<p>' + name.nombre + '</p><br><p id="parrafos">' + name.descripcion + '</p>' +
                    '</div>' +
                    '<div class="col">' +

                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col">' +
                    '<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#captcha_herramienta" onclick="ObtenerHerramientaEditar(' + name.idHerramienta + ',' + "'" + name.nombre + "'" + ');"> <i class="fas fa-pen"> </i> </button>' +//1
                    '<button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#captcha_herramienta_elimina" onclick="ObtenerHerramientaEliminar(' + name.idHerramienta + ',' + "'" + name.nombre + "'" + ');"> <i class="fas fa-trash-alt"> </i> </button>' +//2
                    '</div>' +
                    '</div>' +
                    '</div>');
            });
        }
    });
}
function ObtenerIdCajon(id_cajon) {
    $('#cajon').val(id_cajon);
    console.log(id_cajon);
}
//funciones para cambiar el nombre del cajon
function habilitarNC() {
    id_cajon = $('#id_cajonm').val();
    nom = $('#nc').val();
    id_log = $('#id_log_upt_C').val();
    document.getElementById("textocajon").innerHTML = ' ';
    //nombre = $('#nomc').empty();
    nombre = $('#nomc');
    nombre.append('<input type="text" class="form-control" id="nombre_cajon" value="' + nom + '" onchange="ActualizarNombreCajon(' + id_cajon + ',' +id_log+ ')">');
}

function ActualizarNombreCajon(id_cajon,id_log) {
    nombre = $('#nombre_cajon').val();
    parametros = {
        "id_cajon": id_cajon,
        "nombre": nombre,
        "id_log":id_log
    }
    $.ajax({
        data: parametros,
        url: 'InventarioHControlador.php?operador=actualizar_nombre_cajon',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            nombre = $('#nomc').empty();
            $("#cajon_gabeta").on("hidden.bs.modal", function () {
                location.reload();
            });
            document.getElementById("textocajon").innerHTML = response;
        }
    })
}

function VistaPreviaHerramienta() {
    var archivo = document.getElementById("filenuevah").files[0];
    var reader = new FileReader();
    if (filenuevah) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function () {
            document.getElementById("imgHerramientaNueva").src = reader.result;
        }
    }
}

function VistaPreviaHerramientaEdt() {
    var archivo = document.getElementById("filedt").files[0];
    var reader = new FileReader();
    if (filenuevah) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function () {
            document.getElementById("imgHerramientaedt").src = reader.result;
        }
    }
}

function RegistrarHerramienta() {
    id_cajon = $('#id_cajonm').val();
    nomCajon = $('#nmcj').val();
    //console.log(nomCajon);
    var datos = new FormData($("#regHerramienta")[0])
    $.ajax({
        url: 'InventarioHControlador.php?operador=registrar_herramienta',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function (response) {
            //alert(response);
            if (response == 'success') {
                $("#nueva_herramienta").modal('hide');
                toastr.success("Correctamente!!", "Registrada");
                obtenerHerramientasCajon(id_cajon, nomCajon);
                $("#regHerramienta")[0].reset();
                $("#imgHerramientaNueva").attr("src","imagenes/Herramientas/sinfoto.png");           
            } else if (response == 'requerid') {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == "max") {
                toastr.error("La imagen no se guardo", "Imagen muy grande, agregue una imagen de menor resolución");
            } else {
                toastr.error("No se pudo registrar herramienta", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

const registrarMecanico = () => {
    var datos = new FormData($("#formNuevoMecanico")[0])
    $.ajax({
        url: 'InventarioHControlador.php?operador=registrar_mecanico',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response == 'success') {
                $('#nuevo_mecanico').modal('hide')
                toastr.success("Mecánico registrado exitosamente", "Registrado");
                $("#tablaMecanicos").dataTable().fnDestroy();
                llenarTablaMecanicos();
                $("#formNuevoMecanico")[0].reset();
                $("#imgMecanico").attr("src","imagenes/mecanico/sinFotoPerf.png");
            } else if (response == 'requerid') {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == "max") {
                toastr.error("La imagen no se guardo", "Imagen muy grande, agregue una imagen de menor resolución");
            } else {
                toastr.error("No se pudo registrar mecánico", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

function VistaPreviaMecanico() {
    var archivo = document.getElementById("foto_mecanico").files[0];
    var reader = new FileReader();
    if (archivo) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function () {
            document.getElementById("imgMecanico").src = reader.result;
        }
    }
}


function ObtenerHerramientaEditar(idHerramienta, nombre, idCajon, nombreCajon) {
    $('#idHerra').empty();
    //$('#opc').empty();
    $('#hih').empty();
    $('#idHerra').val(idHerramienta);
    //$('#opc').val(opcion);
    $('#hih').val(nombre);
    $('#idCajon_E').val(idCajon);
    $('#nomC').val(nombreCajon);
    document.getElementById('lbl_herra_cajon').innerHTML = numeroRandom();
    $('#random_herra').val(document.getElementById('lbl_herra_cajon').innerHTML);
}

const ObtenerHerramientaEliminar = (idHerramienta, nombre) => {
    $('#idHerra').empty();
    $('#idHerra').val(idHerramienta);
    $('#hih').val(nombre);
    document.getElementById('lbl_herra_cajon_elimina').innerHTML = numeroRandom();
    $('#random_herra_elimina').val(document.getElementById('lbl_herra_cajon_elimina').innerHTML);
}

const editarHerramienta = (idCajon, nombre_cajon) => {

    if ($("#captcha_herra").val() == $("#random_herra").val()) {
        $('#captcha_herramienta').modal('hide');
        $('#captcha_herra').val("");
        $("#editar_herramienta").modal('show');
        ObtenerHerramientaPorId($('#idHerra').val(), idCajon, nombre_cajon);
    } else {
        $("#captcha_herramienta").modal('hide');
        $('#captcha_herra').val("");
        toastr.error("El captcha ingresado no coincide con el generado", "¡Error!");
    }

}

const captchaEliminaMecanico = (id,nombre) => {
    $('#idMeca').val(id);
    $('#nombre_log').val(nombre);
    document.getElementById('lbl_mecanico_cap').innerHTML = numeroRandom();
    $('#random_meca_elimina').val(document.getElementById('lbl_mecanico_cap').innerHTML);
}
const verificaCaptchaMecanico = () => {
    if ($("#captcha_meca_elimina").val() == $("#random_meca_elimina").val()) {
        $('#captcha_meca_elimina').val("");
        $('#captcha_mecanico_elimina').modal('hide');
        AlertaEliminaMecanico($('#idMeca').val(),$('#id_log_dltM').val(),$('#nombre_log').val());
    } else {
        $("#captcha_mecanico_elimina").modal('hide');
        $('#captcha_meca_elimina').val("");
        toastr.error("El captcha ingresado no coincide con el generado", "¡Error!");
    }
}

const AlertaEliminaMecanico = (id,id_log,nombre) => {
    Swal.fire({
        title: '¿Estas seguro de eliminar a '+nombre+'?',
        html: "No podrás remediarlo",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Elimína!'
    }).then((result) => {
        if (result.value) {
            eliminarMecanico(id,id_log,nombre);
        }
    })
}



const eliminarMecanico = (id,id_log,nombre) => {
    parametros = { 
        "id_mecanico": id,
        "id_log": id_log,
        "nombre": nombre 
    }
    $.ajax({
        data: parametros,
        url: 'InventarioHControlador.php?operador=eliminar_mecanico',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            if (response == 'success') {
                toastr.success("Mecánico eliminado exitosamente", "Eliminado");
                $("#tablaMecanicos").dataTable().fnDestroy();
                llenarTablaMecanicos();
            } else {
                toastr.error("No se pudo eliminar", "Error!");
            }
        },
        error: function () {
        }
    })
}

const eliminarHerramienta = () => {
    if ($("#captcha_herra_elimina").val() == $("#random_herra_elimina").val()) {
        $('#captcha_herramienta_elimina').modal('hide');
        $("#captcha_herra_elimina").val("");

        AlertaEliminarHerramienta($('#idHerra').val(), $('#hih').val());
    } else {
        $("#captcha_herramienta_elimina").modal('hide');
        $("#captcha_herra_elimina").val("");
        toastr.error("El captcha ingresado no coincide con el generado", "¡Error!");
    }
}

function ObtenerHerramientaPorId(idHerramienta, idCajon, nombreCajon) {    
    $('#id_cajon_E').val(idCajon);
    $('#nc_E').val(nombreCajon);
    $.ajax({
        data: { "idHerramienta": idHerramienta },
        url: 'InventarioHControlador.php?operador=obtener_herramienta_por_id',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                $('#idHerredt').val(data[0]["idHerramienta"]);
                $('#edtnombre').val(data[0]["nombre"]);
                $('#edtdescripcion').val(data[0]['descripcion']);
                $('#edtpz').val(data[0]['piezas']);
                $('#edtcosto').val(data[0]['costo']);
                $('#edtanomalia').val(data[0]['anomalia']);
                $('#imgHerramientaedt').prop("src", 'imagenes/Herramientas/' + data[0]['foto']);
                $('#nom_file').val(data[0]['foto']);
                //$('#id_cajon_E').val(idCajon);              
            }
        }
    });
}
const editaFormMecanico = (id, nombre, area, foto) => {
    $('#id_meca_E').val(id);
    $('#nombreME').val(nombre);
    $('#areaME').val(area);
    $('#imgMecanico_E').prop("src", 'imagenes/mecanico/' + foto);
    $('#name_file').val(foto);
}

function VistaPreviaMecanicoE() {
    var archivo = document.getElementById("foto_mecanico_e").files[0];
    var reader = new FileReader();
    if (archivo) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function () {
            document.getElementById("imgMecanico_E").src = reader.result;
        }
    }
}

const editarMecanico = () => {
    var datos = new FormData($("#formEditaMecanico")[0])
    $.ajax({
        data: datos,
        url: 'InventarioHControlador.php?operador=actualizar_mecanico',
        type: 'POST',
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            //alert(response);
            if (response == "success") {
                $('#editar_mecanico').modal('hide');
                toastr.success("Se guardaron los cambios exitosamente", "Cambios guardados");
                $("#tablaMecanicos").dataTable().fnDestroy();
                llenarTablaMecanicos();
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == "max") {
                //alert(response);
                toastr.error("La imagen no se guardo", "Imagen muy grande, agregue una imagen de menor resolución");
            } else {
                alert(response);
                toastr.error("No se pudo editar mecánico", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

function ModificarHerramienta(idC, nomC) {
    var datos = new FormData($("#edtHerramienta")[0])
    $.ajax({
        data: datos,
        url: 'InventarioHControlador.php?operador=modificar_herramienta',
        type: 'POST',
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {
                $("#editar_herramienta").modal('hide');
                obtenerHerramientasCajon(idC, nomC);
                toastr.success("Se guardaron los cambios exitosamente", "Cambios guardados");
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == "max") {
                toastr.error("La imagen no se guardo", "Imagen muy grande, agregue una imagen de menor resolución");
            } else {
                toastr.error("No se pudo modificar herramienta", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

function AlertaEliminarHerramienta(idHerramienta, nombre) {
    Swal.fire({
        title: '¿Estas seguro de Eliminar ' + nombre + '?',
        html: "No podrás remediarlo",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Elimína!'
    }).then((result) => {
        if (result.value) {
            EliminarHerramienta(idHerramienta,nombre);
        }
    })
}

function EliminarHerramienta(idHerramienta,nombre) {    
    nombreCajon = $('#nmcj').val();
    id_cajon = $('#id_cajonm').val();
    id_log = $('#id_log_dlt_G').val();
    parametros = { 
        "idHerramienta": idHerramienta,
        "id_log": id_log,
        "nom": nombre
    }
    $.ajax({
        data: parametros,
        url: 'InventarioHControlador.php?operador=eliminar_herramienta',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {
                toastr.success("Se eliminó la herramienta exitosamente", "Herramienta eliminada");
                $("#detalle_herramienta").modal('hide');
                obtenerHerramientasCajon(id_cajon, nombreCajon);
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else {
                toastr.error("No se pudo eliminar", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

function captchaEliminaGaveta(idGaveta,nombre) {
    $('#nombreG').val(nombre);
    $('#id_gaveta').val(idGaveta);
    document.getElementById('lbl_cap').innerHTML = numeroRandom();
    $('#random').val(document.getElementById('lbl_cap').innerHTML);
}

function captchaEliminaCajon(idCajon,nombre) {
    $('#id_cajon_elimina').val(idCajon);
    $('#nombreCa').val(nombre);
    document.getElementById('lbl_cap_cajon').innerHTML = numeroRandom();
    $('#random_cajon').val(document.getElementById('lbl_cap_cajon').innerHTML);
}


const numeroRandom = () => {
    var numA1 = Math.floor(Math.random() * 10);
    var numA2 = Math.floor(Math.random() * 10);
    var numA3 = Math.floor(Math.random() * 10);
    var numA4 = Math.floor(Math.random() * 10);
    var numAleatorio = `${numA1}${numA2}${numA3}${numA4}`;
    return numAleatorio;
}
function EliminarGabeta(id_gabeta) {    
    if ($('#captcha').val() == $('#random').val()) {
        $('#captcha').val("");
        parametros = { 
            "id_gabeta": id_gabeta,
            "id_log": $('#id_log_dtl_G').val(),
            "nom": $('#nombreG').val()
        }
        $.ajax({
            data: parametros,
            url: 'InventarioHControlador.php?operador=eliminar_gabeta',
            type: 'POST',
            beforeSend: function () { },
            success: function (response) {
                var response = response.trim();
                if (response == "success") {
                    $("#eliminar_gabeta").modal('hide');
                    toastr.success("Se eliminó la gaveta exitosamente", "Eliminado");
                    ConsultarGabetas();
                } else if (response == "requerid") {
                    toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
                } else {
                    toastr.error("No se pudo eliminar", "Error!");
                }
            },
            error: function () {
                toastr.error("Algo salió mal", "Error!");
            }
        })
    } else {
        $("#eliminar_gabeta").modal('hide');
        $('#captcha').val("");
        toastr.error("El captcha ingresado no coincide con el generado", "¡Error!");
    }

}

// function AgregarCajon() {
//     id_cajon = $('#addConfig').val();
// }

function EliminarCajon(id_cajon) {

    if ($('#captcha_cajon').val() == $('#random_cajon').val()) {
        $('#captcha_cajon').val("");        
        nombreCajon = $('#nmcj').val();
        id_cajon = $('#id_cajonm').val();
        id_log = $('#id_log_dlt_C').val();
        parametros = { 
            "id_cajon": id_cajon,
            "id_log": id_log,
            "nom": nombreCajon
        }
        $.ajax({
            data: parametros,
            url: 'InventarioHControlador.php?operador=eliminar_cajon',
            type: 'POST',
            beforeSend: function () { },
            success: function (response) {
                var response = response.trim();
                if (response == "success") {
                    toastr.success("Se eliminó el cajón exitosamente", "Eliminado");
                    $("#eliminar_cajon").modal('hide');
                    $("#cajon_gabeta").modal('hide');
                    ConsultarGabetas();
                    //ObtenerHerramientasCajon(id_cajon, nombreCajon);
                } else if (response == "requerid") {
                    toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
                } else {
                    //alert(response);
                    toastr.error("No se pudo eliminar", "Error!");
                }
            },
            error: function () {
                toastr.error("Algo salió mal", "Error!");
            }
        })
    } else {
        $('#eliminar_cajon').modal('hide');
        toastr.error("El captcha ingresado no coincide con el generado", "¡Error!");
        $('#captcha_cajon').val("");
    }
}

function buscaHerramienta() {
    tableBH = $('#tablaHerramientasB').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'InventarioHControlador.php?operador=lista_Busca_herra',
        columns: [
            { data: 'nombre' },
            { data: 'desc' },
            { data: 'costo' },
            { data: 'piezas' },
            { data: 'anomalia' },
            { data: 'foto' },
            { data: 'resp' },
            { data: 'area' },
            { data: 'gaveta' },
            { data: 'cajon' }
        ]

    });

    $("#buscar_herramienta").on("hidden.bs.modal", function () {
        $("#tablaHerramientasB").dataTable().fnDestroy();
    });
}

const imageView = (nombreH, foto) => {
    document.getElementById('NombreHerra').innerHTML = nombreH;
    document.getElementById("imageTool").src = "../inventario/imagenes/Herramientas/" + foto;
    //$('#mostrarImagen').modal('show');
}