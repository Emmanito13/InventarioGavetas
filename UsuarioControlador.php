<?php
session_start();
require "Usuario.php";

$us = new Usuario();

//Por si se ocupa
if (isset($_SESSION['id_user'])) {
    $idUsuario =  $_SESSION['id_user'];
}
//


switch ($_REQUEST["operador"]) {

    case "lista_usuarios":
        $datos = $us->ListarUsuarios();
        for ($i = 0; $i < count($datos); $i++) {
            $list[] = array(
                "nombre" => $datos[$i]['nombre'],
                "email" => $datos[$i]['email'],
                "foto" => '<img src="imagenes/usuario/' . $datos[$i]['foto'] . '" style="height:100px; width:105px;" alt="User photo">',
                "tipo" => $datos[$i]['permisos'],
                "editar" => concatenaEditaUsuario($datos[$i]['idusuario'], $datos[$i]['nombre'], $datos[$i]['email'], $datos[$i]['foto']),
                "ediC" => ($datos[$i]['idusuario'] == 27) ? " " : concatenaPass($datos[$i]['idusuario'], $datos[$i]['nombre']),
                "eliminar" => ($datos[$i]['permisos'] == 'SUPERADMIN') ? " " : concatenaEliminaUsuario($datos[$i]['idusuario'], $datos[$i]['nombre'])
            );
        }
        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list
        );
        echo json_encode($resultados);
        break;

    case "registrar_usuario":

        if (!empty($_POST['nombre']) && !empty($_POST['email'])) {
            if ($_POST['password'] == $_POST['password2']) {
                $nombreU = $_POST['nombre'];
                $emailU = $_POST['email'];
                $foto = $_FILES["fotoUsu"];
                $pass = $_POST['password'];
                $passE = $us->encryption($pass);
                if (!isset($foto['name']) || empty($foto['name'])) {
                    $foto = null;
                    if ($us->RegistrarUsuario($nombreU, $emailU, $passE, $foto, $idUsuario)) {
                        $response = "success";
                    } else {
                        $response = "failed";
                    }
                } else {
                    if ($_FILES["fotoUsu"]["tmp_name"] == "") {
                        $response = "max";
                    } else {
                        $foto = $_FILES["fotoUsu"];
                        $tamaño = $foto['size'];
                        $type = pathinfo($foto["name"], PATHINFO_EXTENSION);
                        $ruta = md5($foto["tmp_name"]) . "." . $type;
                        $rutaG = "imagenes/usuario/" . $ruta;
                        if ($us->RegistrarUsuario($nombreU, $emailU, $passE, $ruta, $idUsuario)) {
                            if ($tamaño > 40000) {
                                $compressedImage = compressImage($foto["tmp_name"], $rutaG, 75);
                                $response = "success";
                            } else {
                                $response = "success";
                                move_uploaded_file($foto["tmp_name"], $rutaG);
                            }
                        } else {
                            $response = "failed";
                        }
                    }
                }
            } else {
                $response = "errorpass";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "actualizar_usuario":
        if (!empty($_POST["nombreUE"]) && !empty($_POST["emailUE"])) {
            $id_usu = $_POST['id_usu_E'];
            $foto_def = $_POST['name_file'];
            $nombre = $_POST['nombreUE'];
            $email = $_POST['emailUE'];
            $foto = $_FILES["foto_usuario_e"];
            if (!isset($foto['name']) || empty($foto['name'])) {
                if ($us->EditarUsuario($id_usu, $nombre, $email, $foto_def, $idUsuario)) {
                    $response = "success";
                } else {
                    $response = "failed";
                }
            } else {
                if ($_FILES["foto_usuario_e"]["tmp_name"] == "") {
                    $response = "max";
                } else {
                    $foto = $_FILES["foto_usuario_e"];
                    $tamaño = $foto['size'];
                    $type = pathinfo($foto["name"], PATHINFO_EXTENSION);
                    $ruta = md5($foto["tmp_name"]) . "." . $type;
                    $rutaG = "imagenes/usuario/" . $ruta;
                    if ($us->EditarUsuario($id_usu, $nombre, $email, $ruta, $idUsuario)) {
                        if ($tamaño > 40000) {
                            $compressedImage = compressImage($foto["tmp_name"], $rutaG, 75);
                            $response = "success";
                        } else {
                            $response = "success";
                            move_uploaded_file($foto["tmp_name"], $rutaG);
                        }
                        if ($foto_def != 'sinFotoPerf.png') {
                            unlink("imagenes/usuario/" . $foto_def);
                        }
                    } else {
                        $response = "failed";
                    }
                }
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "cpass":
        if (!empty($_POST['p1']) && !empty($_POST['p2'])) {
            $id_us = $_POST['id'];
            $pass = $_POST['p1'];
            $nom = $_POST['nom'];
            $nPass = $us->encryption($pass);
            if ($us->ePass($id_us, $nPass, $nom, $idUsuario)) {
                $response = 'success';
            } else {
                $response = 'error';
            }
        } else {
            $response = 'requerid';
        }
        echo $response;
        break;

    case "elimina_usuario":
        $id_u = $_POST['id'];
        $nom = $_POST['nom'];
        if ($us->EliminarUsuario($id_u, $nom, $idUsuario)) {
            $reponse = 'success';
        } else {
            $response = 'error';
        }
        echo $reponse;
        break;

    case "bitacora":
        $datos = $us->Bitacora();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "usuario" => $datos[$i]['usuario'],
                    "accion" => $datos[$i]['accion'],
                    "fecha" => $datos[$i]['fecha'],
                    "hora" => $datos[$i]['hora']
                );
            }
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );
            echo json_encode($resultados);
        } else {
            $list[] = array(
                "usuario" => "No hay registros",
                "accion" => " " ,
                "fecha" => " " ,
                "hora" => " "
            );

            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );
            echo json_encode($resultados);
        }
        break;
        // case "listar_usuario":
        //     $datos = $us->ListarUsuarios();
        //     $permiso = $_SESSION["user"]["permisos"];
        //     if (!empty($datos)) {
        //         for ($i = 0; $i < count($datos); $i++) {
        //             if ($datos[$i]['foto'] == 'd41d8cd98f00b204e9800998ecf8427e.jpg') {
        //                 $imgn = 'src="../imagenes/sinImagen.jpg"';
        //             } else {
        //                 $imgn = 'src="../imagenes/usuario/' . $datos[$i]['foto'] . '"';
        //             }
        //             if ($permiso == 'SUPERADMIN' || $permiso == 'ADMIN') {
        //                 if ($datos[$i]['secreta'] == NULL || $datos[$i]['secreta'] == ' ') {
        //                     $clavesecreta = '<button class="btn btn-warning" data-toggle="modal" data-target="#asignar_clave_secreta" onclick="ObtenerIdU(' . $datos[$i]['idusuario'] . ');"><i class="fas fa-user-lock"></i> </button>';
        //                     $mostrarSecreta = '';
        //                 } else {
        //                     $clavesecreta = '';
        //                     $mostrarSecreta = '<button class="btn btn-success" data-toggle="modal" data-target="#mostrar_secreta" onclick="ObtenerSecreta(' . $datos[$i]['idusuario'] . ');"> <i class="fas fa-key"></i> </button>  <button class="btn btn-light btn-sm" onclick="QuitarSecreta(' . $datos[$i]['idusuario'] . ');"> <i class="   fas fa-times"></i> </button>';
        //                 }
        //             } else {
        //                 $clavesecreta = '';
        //                 $mostrarSecreta = '';
        //             }
        //             $list[] = array(
        //                 "nombre" => $datos[$i]['nombre'],
        //                 "email" => $datos[$i]['email'] . '<div class="float-right"><a class="btn btn-light" data-toggle="modal" data-target="#asignar_permiso" onclick="ObtenerIdUsuario(' . $datos[$i]['idusuario'] . ');"><i class="fas fa-users-cog"></i> Rol de Usuario  </a>' . $clavesecreta . '</div>',
        //                 "password" => '<button class="btn btn-success" data-toggle="modal" data-target="#mostrar_password" onclick="ObtenerPassword(' . $datos[$i]['idusuario'] . ');"> <i class="fas fa-key"></i> </button>',
        //                 "secreta" => $mostrarSecreta,
        //                 "foto" => '<a data-toggle="modal" data-target="#foto_Usuario" onclick="ObtenerIdUsuario(' . $datos[$i]['idusuario'] . ');">
        //              <img ' . $imgn . ' style="height: 40px; width: 40px;" class="brand-image img-circle elevation-3" onmouseover="zoom(' . $datos[$i]['idusuario'] . ');" onmouseout="normal(' . $datos[$i]['idusuario'] . ');" id="perfilusuario' . $datos[$i]['idusuario'] . '">',
        //                 "op" => '<div class="btn-group">
        //                         <button class="btn btn-info btn-sm" data-toggle="dropdown" 
        //                             aria-haspopup="true" aria-expanded="true"><i class="fas fa-user-cog"></i>
        //                         </button>
        //                         <div class="dropdown-menu">
        //                             <a class="dropdown-item" data-toggle="modal" data-target="#modificar_usuario" 
        //                             onclick="ObtenerUsuarioPorId(' . $datos[$i]['idusuario'] . ",'editar'" . ');">
        //                             <i class="fas fa-pen"></i> Editar</a>

        //                             <a class="dropdown-item" onclick="AlertaEliminarUsuario(' . $datos[$i]['idusuario'] . ');">
        //                             <i class="fas fa-trash-alt"></i> Eliminar</a>
        //                         </div>
        //                    </div>'
        //             );
        //         }
        //         $resultados = array(
        //             "sEcho" => 1,
        //             "iTotalRecords" => count($list),
        //             "iTotalDisplayRecords" => count($list),
        //             "aaData" => $list
        //         );
        //         echo json_encode($resultados);
        //     } else {
        //         echo json_encode($datos);
        //     }

        //     break;

        // case "registrar_usuario":
        //     $imagen = $_FILES["fotouser"];
        //     $tamaño = $imagen['size'];
        //     if (isset($_POST['nombre'], $_POST['email'], $_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        //         $nombre = $_POST["nombre"];
        //         $email = $_POST["email"];
        //         $password = $_POST["password"];
        //         $passwordE = $us->encryption($password);
        //         //foto
        //         $imagen = $_FILES["fotouser"];
        //         $ruta = md5($imagen["tmp_name"]) . ".jpg";
        //         $rutaG = "../imagenes/usuario/" . md5($imagen["tmp_name"]) . ".jpg";
        //         $tipo = "1";
        //         $permisos = "1";
        //         $estatus = "activo";
        //         if ($us->RegistrarUsuario($nombre, $email, $passwordE, $ruta, $tipo, $permisos, $estatus)) {
        //             if ($tamaño > 40000) {
        //                 $List = [
        //                     "name" => $name = md5($imagen["tmp_name"]) . ".jpg",
        //                     "type" => $type = $imagen["type"],
        //                     "tmp_name" => $tmp_name = $imagen["tmp_name"],
        //                     "error" => $error = $imagen["error"],
        //                     "size" => $size = $imagen["size"]
        //                 ];
        //                 include "../Modelo/class.upload.php";
        //                 $up = new Upload($List);
        //                 $correct = false;
        //                 if ($up->uploaded) {
        //                     $up->Process("../imagenes/grandes/");
        //                     if ($up->processed) {
        //                         $up->image_resize = true;
        //                         $up->image_x = $up->image_src_x / 2;
        //                         $up->image_ratio_y = true;
        //                         $up->jpeg_quality = 50;
        //                         $up->Process("../imagenes/usuario/");
        //                         if ($up->processed) {
        //                             $response = "success";
        //                         }
        //                     }
        //                 }
        //             } else {
        //                 move_uploaded_file($imagen["tmp_name"], $rutaG);
        //             }
        //         } else {
        //             $response = "notfound";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;

        // case "obtener_usuario_por_id":
        //     if (isset($_POST["idusuario"]) && !empty($_POST["idusuario"])) {
        //         $data = $us->ObtenerUsuarioPorId($_POST["idusuario"]);
        //         if ($data) {
        //             $list[] = array(
        //                 "idusuario" => $data['idusuario'],
        //                 "nombre" => $data['nombre'],
        //                 "email" => $data['email'],
        //                 "foto" => $data['foto']
        //             );
        //             echo json_encode($list);
        //         }
        //     }
        //     break;

        // case "actualizar_usuario":
        //     if (isset($_POST["idusuariomod"], $_POST["nombremod"], $_POST["emailmod"]) && !empty($_POST["idusuariomod"]) && !empty($_POST["nombremod"]) && !empty($_POST["emailmod"])) {
        //         $idusuario = $_POST["idusuariomod"];
        //         $nombre = $_POST["nombremod"];
        //         $email = $_POST["emailmod"];
        //         if ($us->ActualizarUsuario($idusuario, $nombre, $email)) {
        //             $response = "success";
        //         } else {
        //             $response = "failed";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;

        // case "actualizar_foto_usuario":
        //     $imagen = $_FILES["fotousermod"];
        //     $tamaño = $imagen['size'];
        //     if ($imagen["type"] == "image/jpg" or $imagen["type"] == "image/jpeg" or $imagen["type"] == "image/png") {
        //         $ruta = md5($imagen["tmp_name"]) . ".jpg";
        //         $rutaG = "../imagenes/usuario/" . md5($imagen["tmp_name"]) . ".jpg";
        //         $idusuario = $_POST["idUsuarioFoto"];
        //         if ($us->ActualizarFoto($idusuario, $ruta)) {
        //             if ($tamaño > 40000) {
        //                 $List = [
        //                     "name" => $name = md5($imagen["tmp_name"]) . ".jpg",
        //                     "type" => $type = $imagen["type"],
        //                     "tmp_name" => $tmp_name = $imagen["tmp_name"],
        //                     "error" => $error = $imagen["error"],
        //                     "size" => $size = $imagen["size"]
        //                 ];
        //                 include "../Modelo/class.upload.php";
        //                 $up = new Upload($List);
        //                 $correct = false;
        //                 if ($up->uploaded) {
        //                     $up->Process("../imagenes/grandes/");
        //                     if ($up->processed) {
        //                         $up->image_resize = true;
        //                         $up->image_x = $up->image_src_x / 2;
        //                         $up->image_ratio_y = true;
        //                         $up->jpeg_quality = 50;
        //                         $up->Process("../imagenes/usuario/");
        //                         if ($up->processed) {
        //                             $response = "success";
        //                         }
        //                     }
        //                 }
        //             } else {
        //                 move_uploaded_file($imagen["tmp_name"], $rutaG);
        //             }
        //         } else {
        //             $response = "error";
        //         }
        //     } else {
        //         $response = "errorFormato";
        //     }
        //     echo $response;
        //     break;

        // case "eliminar_usuario":
        //     if (isset($_POST["idusuario"]) && !empty($_POST["idusuario"])) {
        //         $estado = "baja";
        //         if ($us->EliminarUsuario($_POST["idusuario"], $estado)) {
        //             $reponse = "success";
        //         } else {
        //             $reponse = "error";
        //         }
        //     } else {
        //         $reponse = "error";
        //     }
        //     echo $reponse;
        //     break;

    case "validar_usuario":
        if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordE = $us->encryption($password);
            if ($user = $us->ValidarUsuario($email, $passwordE)) {
                foreach ($user as $campos => $valor) {
                    $_SESSION["user"][$campos] = $valor;
                }
                $response = "success";
            } else {
                $response = "notfound";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

        // case "obtener_password":
        //     $idusuario = $_POST["idusuario"];
        //     $password = $us->ObtenerPassword($idusuario);
        //     $passwordD = $us->decryption($password);
        //     echo $passwordD;
        //     break;

        // case "actualizar_usuario":
        //     if (isset($_POST["idusuariomod"], $_POST["nombremod"], $_POST["emailmod"]) && !empty($_POST["idusuariomod"]) && !empty($_POST["nombremod"]) && !empty($_POST["emailmod"])) {
        //         $idusuario = $_POST["idusuariomod"];
        //         $nombre = $_POST["nombremod"];
        //         $email = $_POST["emailmod"];
        //         if ($us->ActualizarUsuario($idusuario, $nombre, $email)) {
        //             $response = "success";
        //         } else {
        //             $response = "failed";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;

    case "cerrar_sesion":
        // $files = glob('imagenes/grandes/*');
        // foreach ($files as $file) {
        //     if (is_file($file))
        //         unlink($file);
        // }
        // $idusuario = $_SESSION["user"]["idusuario"];
        // $us->BorrarTemporal($idusuario);
        unset($_SESSION["user"]);
        header("location:index.html");
        break;

        // case "validar_clave_secreta":
        //     if (isset($_POST["idusuario"], $_POST["secreta"]) && !empty($_POST["idusuario"]) && !empty($_POST["secreta"])) {
        //         $idusuario = $_POST["idusuario"];
        //         $secreta = $_POST["secreta"];
        //         $secretaE = $us->encryption($secreta);
        //         if ($user = $us->ValidarClaveSecreta($idusuario, $secretaE)) {
        //             $response = "success";
        //         } else {
        //             $response = "notfound";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;

        /*case "asignar_secreta":
if(isset($_POST["idusuario"], $_POST["secreta"]) && !empty($_POST["idusuario"]) && !empty($_POST["secreta"])){
        $idusuario = $_POST["idusuario"];
        $secreta = $_POST["secreta"];
        $secretaE = $us->encryption($secreta); 
        ///obtener y desencriptar password
        if ($us->ExisteSecreta($secretaE)) {
            $response ="repetida";
        }else{
            if($us->AsignarSecreta($idusuario,$secretaE)){
                $response="success";
            } else {
                $response="failed";
            }
        }
    } else {
        $response="requerid";
    }
    echo $response;
break;*/

        // case "asignar_secreta":
        //     if (isset($_POST["idusuario"], $_POST["secreta"]) && !empty($_POST["idusuario"]) && !empty($_POST["secreta"])) {
        //         $idusuario = $_POST["idusuario"];
        //         $secreta = $_POST["secreta"];
        //         $secretaE = $us->encryption($secreta);
        //         ///obtener y desencriptar password
        //         if ($us->AsignarSecreta($idusuario, $secretaE)) {
        //             $response = "success";
        //         } else {
        //             $response = "failed";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;

        // case "eliminar_clave_sec":
        //     if (isset($_POST["idusuario"]) && !empty($_POST["idusuario"])) {
        //         if ($us->EliminarClaveSecreta($_POST["idusuario"])) {
        //             $reponse = "success";
        //         } else {
        //             $reponse = "error";
        //         }
        //     } else {
        //         $reponse = "error";
        //     }
        //     echo $reponse;
        //     break;

        // case "obtener_secreta":
        //     $idusuario = $_POST["idusuario"];
        //     $secreta = $us->ObtenerSecreta($idusuario);
        //     $secretaD = $us->decryption($secreta);
        //     echo $secretaD;
        //     break;

        // case "asignar_permiso":
        //     if (isset($_POST['idusuario'], $_POST['permiso']) && !empty($_POST['idusuario']) && !empty($_POST['permiso'])) {
        //         $idusuario = $_POST["idusuario"];
        //         $permiso = $_POST["permiso"];
        //         if ($us->AsignarPermiso($idusuario, $permiso)) {
        //             $response = "success";
        //         } else {
        //             $response = "notfound";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;
}

function compressImage($source, $destination, $quality)
{
    // Obtenemos la información de la imagen
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];


    // Creamos una imagen
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }
    imagejpeg($image, $destination, $quality);

    // Devolvemos la imagen comprimida
    return $destination;
}

function concatenaEditaUsuario($id, $nombre, $email, $foto)
{
    $nom = "'" . $nombre . "'";
    $correo = "'" . $email . "'";
    $img = "'" . $foto . "'";
    $cad = '<input type="image" src="imagenes/editar.png" width="36px" data-toggle="modal" data-target="#editar_usuario" onclick="editaFormUsuario(' . $id . ',' . $nom . ',' . $correo . ',' . $img . ')">';
    return $cad;
}

function concatenaPass($id, $nombre)
{
    $nom = "'" . $nombre . "'";
    $cad = '<input type="image" src="imagenes/pass.png" width="40px" data-toggle="modal" data-target="#epass" onclick="epForm(' . $id . ',' . $nom . ')">';
    return $cad;
}

function concatenaEliminaUsuario($id, $nombre)
{
    $nom = "'" . $nombre . "'";
    $cad = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#captchaEliminaUsuario" onclick="captchaEliminaUsu(' . $id . ',' . $nom . ')"><i class="fas fa-trash-alt"></i></button>';
    return $cad;
}
