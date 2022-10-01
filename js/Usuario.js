init();

function init() {
    llenarTablaUsuarios();
}

function ValidarUsuario() {
    email = $('#loginemail').val();
    password = $('#loginpassword').val();
    parametros = {
        "email": email,
        "password": password
    }

    $.ajax({
        data: parametros,
        url: 'UsuarioControlador.php?operador=validar_usuario',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {
                location.href = "TablaMecanicos.php";
            } else if (response == "notfound") {
                msg = '<div class="alert alert-danger mb-2" role="alert"><strong>Oh no ! </strong>' +
                    'Error del servidor.</div>';
            } else if (response == "requerid") {
                msg = '<div class="alert alert-danger mb-2" role="alert"><strong>Oh no ! </strong>' +
                    'Parece que no has completado todos los campos.</div>';
            } else {
                msg = '<div class="alert alert-warning mb-2" role="alert"><strong>Oh no ! </strong>' +
                    'El email y/o password son incorrectos.</div>';
            }
            $('#mensaje').html(msg);
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

function llenarTablaUsuarios() {
    tableUsuarios = $('#tablaUsuarios').dataTable({
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: 'UsuarioControlador.php?operador=lista_usuarios',
        columns: [
            { data: 'nombre' },
            { data: 'email' },
            { data: 'foto' },
            { data: 'tipo' },
            { data: 'editar' },
            { data: 'ediC' },
            { data: 'eliminar' }

        ]

    });
}

function VistaPreviaNUsuario() {
    var archivo = document.getElementById("fotoUsu").files[0];
    var reader = new FileReader();
    if (archivo) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function () {
            document.getElementById("imgPerfil").src = reader.result;
        }
    }
}

function VistaPreviaEUsuario() {
    var archivo = document.getElementById("foto_usuario_e").files[0];
    var reader = new FileReader();
    if (archivo) {
        reader.readAsDataURL(archivo);
        reader.onloadend = function () {
            document.getElementById("imgUsuario_E").src = reader.result;
        }
    }
}

const RegistrarUsuario = () => {
    var datos = new FormData($("#registrarUser")[0])
    $.ajax({
        url: 'UsuarioControlador.php?operador=registrar_usuario',
        type: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        success: function (response) {
            //alert(response);
            if (response == 'success') {
                Swal.fire(
                    'Registrado!',
                    'Corectamente, .',
                    'success'
                )
                $("#nuevo_usuario").modal('hide');
                $("#tablaUsuarios").dataTable().fnDestroy();
                llenarTablaUsuarios();
                $("#registrarUser")[0].reset();
                $("#imgPerfil").attr("src", "imagenes/usuario/sinFotoPerf.png");
            } else if (response == 'errorpass') {
                toastr.warning("Las contraseñas ingresadas no coinciden", "Contraseñas diferentes");
            } else if (response == 'requerid') {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == 'max') {
                toastr.error("La imagen no se guardo", "Imagen muy grande, agregue una imagen de menor resolución");
            } else {
                toastr.error("No se pudo registrar usuario", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

const editaFormUsuario = (id, nombre, area, foto) => {
    $('#id_usu_E').val(id);
    $('#name_file').val(foto);
    $('#nombreUE').val(nombre);
    $('#emailUE').val(area);
    $('#imgUsuario_E').prop("src", 'imagenes/usuario/' + foto);
}
const editarUsuario = () => {
    var datos = new FormData($("#formEditaUsuario")[0])
    $.ajax({
        data: datos,
        url: 'UsuarioControlador.php?operador=actualizar_usuario',
        type: 'POST',
        contentType: false,
        processData: false,
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            //alert(response);
            if (response == "success") {
                $('#editar_usuario').modal('hide');
                toastr.success("Se guardaron los cambios exitosamente", "Cambios guardados");
                $("#tablaUsuarios").dataTable().fnDestroy();
                llenarTablaUsuarios();                
            } else if (response == "requerid") {
                toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
            } else if (response == "max") {
                //alert(response);
                toastr.error("La imagen no se guardo", "Imagen muy grande, agregue una imagen de menor resolución");
            } else {
                //alert(response);
                toastr.error("No se pudo editar usuario", "Error!");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}

const epForm = (id,nombre) =>{
    $('#id_usu').val(id);
    $('#nom').val(nombre);
}

const ePass = () => {
    id = $('#id_usu').val();
    p1 = $('#pass').val();
    p2 = $('#pass2').val();
    nom = $('#nom').val();
    if(p1 == p2){
        parametros = {
            "id":id,
            "p1":p1,
            "p2":p2,
            "nom":nom
        }
        $.ajax({
            data: parametros,
            url: 'UsuarioControlador.php?operador=cpass',
            type: 'POST',
            beforeSend: function () { },
            success: function (response) {
                var response = response.trim();
                if (response == "success") {
                    $('#epass').modal('hide');
                    toastr.success("Se cambio la contraseña correctamente", "Contraseña actualizada");
                    $("#tablaUsuarios").dataTable().fnDestroy();
                    llenarTablaUsuarios();
                } else if (response == "requerid") {                
                    toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
                } else {
                    toastr.error("La contraseña no se pudo guardar", "Error inesperado");
                }
            },
            error: function () {
                toastr.error("Algo salió mal", "Error!");
            }
        })

    }else{
        toastr.warning("Las contraseñas ingresadas no coinciden", "Contraseñas diferentes");
    }
}

const numeroRandom = () => {
    var numA1 = Math.floor(Math.random() * 10);
    var numA2 = Math.floor(Math.random() * 10);
    var numA3 = Math.floor(Math.random() * 10);
    var numA4 = Math.floor(Math.random() * 10);
    var numAleatorio = `${numA1}${numA2}${numA3}${numA4}`;
    return numAleatorio;
}

function captchaEliminaUsu(id,nombre) {
    $('#idUser').val(id);
    $('#nom_eli_log').val(nombre);
    document.getElementById('lbl_user_cap').innerHTML = numeroRandom();
    $('#random_user_elimina').val(document.getElementById('lbl_user_cap').innerHTML);
}

function alertaEliminaUsuario(id,nombre){
    if($("#captcha_user_elimina").val() == $("#random_user_elimina").val()){
        $('#captchaEliminaUsuario').modal('hide');
        $('#captcha_user_elimina').val("");
        Swal.fire({
            title: '¿Estas seguro de eliminar este usuario?',
            html: "No podrás remediarlo",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Elimína!'
        }).then((result) => {
            if (result.value) {                
                eliminaUsuario(id,nombre);
            }
        })
    }else{
        toastr.error("El captcha ingresado no coincide con el generado", "Captcha incorrecto");
        $('#captchaEliminaUsuario').modal('hide');
        $('#captcha_user_elimina').val("");
    }
}

const eliminaUsuario = (id,nombre) =>{
    parametros = {
        "id": id,
        "nom":nombre
    }
    $.ajax({
        data: parametros,
        url: 'UsuarioControlador.php?operador=elimina_usuario',
        type: 'POST',
        beforeSend: function () { },
        success: function (response) {
            var response = response.trim();
            if (response == "success") {                
                toastr.success("Se elimino el usuario con exito", "Usuario eliminado");
                $("#tablaUsuarios").dataTable().fnDestroy();
                llenarTablaUsuarios();
            }else {
                toastr.error("El usuario no se pudo eliminar", "Error inesperado");
            }
        },
        error: function () {
            toastr.error("Algo salió mal", "Error!");
        }
    })
}
// function ObtenerUsuarioPorId(idusuario) {
//     $.ajax({
//         data: { "idusuario": idusuario },
//         url: '../Controlador/UsuarioControlador.php?operador=obtener_usuario_por_id',
//         type: 'POST',
//         beforeSend: function() {},
//         success: function(response) {
//             data = $.parseJSON(response);
//             if (data.length > 0) {
//                 $('#idusuariomod').val(data[0]["idusuario"]);
//                 $('#nombremod').val(data[0]['nombre']);
//                 $('#emailmod').val(data[0]['email']);
//                 document.getElementById("imgPerfilmod").src = '../imagenes/usuario/' + data[0]['foto'];
//             }
//         }
//     });
// }

// function VistaPreviaPerfilMod() {
//     var archivo = document.getElementById("filemod").files[0];
//     var reader = new FileReader();
//     if (filemod) {
//         reader.readAsDataURL(archivo);
//         reader.onloadend = function() {
//             document.getElementById("imgPerfilmod").src = reader.result;
//         }
//     }
// }

// function RegistrarUsuario() {
//     var datos = new FormData($("#registrarUser")[0])
//     $.ajax({
//         url: '../Controlador/UsuarioControlador.php?operador=registrar_usuario',
//         type: 'POST',
//         data: datos,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             Swal.fire(
//                 'Registrado!',
//                 'Corectamente, .',
//                 'success'
//             )
//             $("#nuevo_usuario").modal('hide');
//             tableUsuarios.ajax.reload();
//         }
//     })
// }

// function ActualizarUsuario() {
//     var datos = new FormData($("#modificarUsuario")[0]);
//     $.ajax({
//         data: datos,
//         url: '../Controlador/UsuarioControlador.php?operador=actualizar_usuario',
//         type: 'POST',
//         contentType: false,
//         processData: false,
//         beforeSend: function() {},
//         success: function(response) {
//             var response = response.trim();
//             if (response == "success") {
//                 tableUsuarios.ajax.reload();
//             } else if (response == "requerid") {
//                 toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
//             } else {
//                 toastr.error("No se pudo actualizar", "Error!");
//             }
//         },
//         error: function() {
//             toastr.error("Algo salió mal", "Error!");
//         }
//     })
// }

// function ObtenerIdUsuario(idusuario) {
//     $('#ideusuario').val(idusuario);
//     $('#idUsuarioFoto').val(idusuario);
//     $.ajax({
//         data: { "idusuario": idusuario },
//         url: '../Controlador/UsuarioControlador.php?operador=obtener_usuario_por_id',
//         type: 'POST',
//         beforeSend: function() {},
//         success: function(response) {
//             data = $.parseJSON(response);
//             if (data.length > 0) {
//                 $('#idUsuarioFoto').val(data[0]["idusuario"]);
//                 document.getElementById("imgPerfilmod").src = '../imagenes/usuario/' + data[0]['foto'];
//             }
//         }
//     });
// }

// function ActualizarFotoUsuario() {
//     var datos = new FormData($("#modificarFotoUser")[0]);
//     $.ajax({
//         data: datos,
//         url: '../Controlador/UsuarioControlador.php?operador=actualizar_foto_usuario',
//         type: 'POST',
//         contentType: false,
//         processData: false,
//         beforeSend: function() {},
//         success: function(response) {
//             tableUsuarios.ajax.reload();
//             Swal.fire({
//                 title: 'Registrado!',
//                 html: "correctamente!",
//                 type: 'success'
//             })
//         },
//         error: function() {
//             toastr.error("Algo salió mal", "Error!");
//         }
//     })
// }

// function AlertaEliminarUsuario(idusuario) {
//     Swal.fire({
//         title: '¿ Estas seguro de Eliminar?',
//         html: "No podrás remediarlo",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si, Eliminalo!'
//     }).then((result) => {
//         if (result.value) {
//             EliminarUsuario(idusuario);
//         }
//     })
// }

// function EliminarUsuario(idusuario) {
//     $.ajax({
//         data: { "idusuario": idusuario },
//         url: '../Controlador/UsuarioControlador.php?operador=eliminar_usuario',
//         type: 'POST',
//         beforeSend: function() {},
//         success: function(response) {
//             var response = response.trim();
//             if (response == "success") {
//                 tableUsuarios.ajax.reload();
//                 Swal.fire({
//                     title: 'Eliminado',
//                     html: "Usuario Eliminado correctamente",
//                     type: 'success'
//                 })
//             } else {
//                 tableUsuarios.ajax.reload();
//                 Swal.fire({
//                     title: 'Oh no!',
//                     html: "Algo salió mal",
//                     type: 'error'
//                 })
//             }
//         },
//         error: function(response) {
//             toastr.error("Algo salió mal", "Error!");
//         }
//     });
// }

// function VistaPreviaPerfil() {
//     var archivo = document.getElementById("file").files[0];
//     var reader = new FileReader();
//     if (file) {
//         reader.readAsDataURL(archivo);
//         reader.onloadend = function() {
//             document.getElementById("imgPerfil").src = reader.result;
//         }
//     }
// }

// function ObtenerPassword(idusuario) {
//     $.ajax({
//         data: { "idusuario": idusuario },
//         type: 'POST',
//         url: '../Controlador/UsuarioControlador.php?operador=obtener_password',
//         beforeSend: function() {},
//         success: function(response) {
//             var $ObtenerPassword = $('#obtener_password');
//             $('#obtener_password').empty();
//             $ObtenerPassword.append('<div class="col">' +
//                 '<span class="direct-chat-timestamp ">Password: ' + response + '</span>' +
//                 '</div>');
//         }
//     });
// }

// function recargar() {

//     location.reload();
// }

// function AsignarPermiso() {
//     idusuario = $('#ideusuario').val();
//     permiso = $('#asigPermiso').val();
//     parametros = {
//         "idusuario": idusuario,
//         "permiso": permiso
//     }
//     $.ajax({
//         data: parametros,
//         url: '../Controlador/UsuarioControlador.php?operador=asignar_permiso',
//         type: 'POST',
//         beforeSend: function() {},
//         success: function(response) {
//             var response = response.trim();
//             if (response == "success") {
//                 $('#asignar_permiso').modal('hide');
//                 toastr.success("Permiso Asignado", "");
//             } else if (response == "requerid") {
//                 toastr.warning("Complete todos los campos porfavor", "Campos Incompletos");
//             } else {
//                 toastr.error("No se pudo actualizar", "Error!");
//             }
//         },
//         error: function() {
//             toastr.error("Algo salió mal", "Error!");
//         }
//     })
// }

// function zoom(idusuario) {
//     document.getElementById('perfilusuario' + idusuario).style.height = '280px';
//     document.getElementById('perfilusuario' + idusuario).style.width = '280px';
// }

// function normal(idusuario) {
//     document.getElementById('perfilusuario' + idusuario).style.height = '40px';
//     document.getElementById('perfilusuario' + idusuario).style.width = '40px';
// }

// jQuery(document).ready(function($) {
//     $(document).ready(function() {
//         $('#asigPermiso').select1();
//     });
// });

// function ObtenerIdU(idusuario) {
//     cvesecreta
//     $('#idu').val(idusuario);
// }

// function IngresarClaveSecreta() {
//     secreta = $('#cvesecreta').val();
//     idusuario = $('#idu').val();
//     parametros = {
//         "idusuario": idusuario,
//         "secreta": secreta
//     }
//     $.ajax({
//         data: parametros,
//         url: '../Controlador/UsuarioControlador.php?operador=asignar_secreta',
//         type: 'POST',
//         beforeSend: function() {},
//         success: function(response) {
//             var response = response.trim();
//             if (response == "success") {
//                 $('#asignar_clave_secreta').modal('hide');
//                 tableUsuarios.ajax.reload();
//             } else if (response == "requerid") {
//                 toastr.warning("Ingresa una clave", "Campos Incompletos");
//             } else if (response == "repetida") {
//                 toastr.warning("Alguien ya tiene asignada esa clave", "Intenta una nueva");
//             } else {
//                 toastr.error("No se pudo asignar", "Error!");
//             }
//         },
//         error: function() {
//             toastr.error("Algo salió mal", "Error!");
//         }
//     })
// }

// function ObtenerSecreta(idusuario) {
//     $.ajax({
//         data: { "idusuario": idusuario },
//         type: 'POST',
//         url: '../Controlador/UsuarioControlador.php?operador=obtener_secreta',
//         beforeSend: function() {},
//         success: function(response) {
//             var $ObtenerSecreta = $('#obtener_secreta');
//             $('#obtener_secreta').empty();
//             $ObtenerSecreta.append('<div class="col">' +
//                 '<span class="direct-chat-timestamp ">Clave Secreta: ' + response + '</span>' +
//                 '</div>');
//         }
//     });
// }

// function QuitarSecreta(idusuario) {
//     $.ajax({
//         data: { "idusuario": idusuario },
//         url: '../Controlador/UsuarioControlador.php?operador=eliminar_clave_sec',
//         type: 'POST',
//         beforeSend: function() {},
//         success: function(response) {
//             var response = response.trim();
//             if (response == "success") {
//                 tableUsuarios.ajax.reload();
//             } else {
//                 tableUsuarios.ajax.reload();
//                 Swal.fire({
//                     title: 'Oh no!',
//                     html: "Algo salió mal",
//                     type: 'error'
//                 })
//             }
//         },
//         error: function(response) {
//             toastr.error("Algo salió mal", "Error!");
//         }
//     });
// }