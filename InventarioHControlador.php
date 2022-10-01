<?php

use function PHPSTORM_META\type;

session_start();
require "InventarioH.php";

$inv = new Inventario();

if (isset($_GET['id'])) {
    $id =  $_GET['id'];
}


switch ($_REQUEST["operador"]) {
    case "listar_herramientas":
        $datos = $inv->ListarHerramientas();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                if ($datos[$i]['foto'] == 'sin.jpg') {
                    $imgn = 'src="imagenes/sinImagen.jpg"';
                } else {
                    $imgn = 'src="imagenes/Herramientas/' . $datos[$i]['foto'] . '"';
                }
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "descripcion" => $datos[$i]['descripcion'],
                    "costo" => $datos[$i]['costo'],
                    "foto" => '<img ' . $imgn . ' style="height: 150px; width: 140px;">',
                    "op" => '<div class="btn-group">
                 <button class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-user-cog"></i></button>
                     <div class="dropdown-menu">
                         <a class="dropdown-item" data-toggle="modal" data-target="#update_Mecanico"
                         onclick="ObtenerUnidadPorId(' . $datos[$i]['idHerramienta'] . ",'editar'" . ');">
                         <i class="fas fa-user-edit"></i> Editar</a>

                         <a class="dropdown-item" onclick="ObtenerUnidadPorId(' . $datos[$i]['idHerramienta'] . ",'eliminar'" . ');">
                         <i class="fas fa-user-minus"></i> Eliminar</a>
                     </div>
                </div>'
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
            echo json_encode($datos);
        }

        break;

    case "consultar_mecanicos":
        $mecanicos = $inv->ConsultarMecanicos();
        echo json_encode($mecanicos);
        break;

    case "lista_mecanicos":

        $datos = $inv->listaMecanicos();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "area" => $datos[$i]['area'],
                    "foto" => '<img src="imagenes/mecanico/' . $datos[$i]['foto'] . '" style="height:100px; width:105px;" alt="Tool photo">',
                    "gaveta" => '<input id="btnBavetas" name="btnBavetas" type="image" src="imagenes/cajones.png" width="66px" onclick="gavetas(' . $datos[$i]['id_mecanico'] . ')">',
                    "editar" => concatenaEditaUsuario($datos[$i]['id_mecanico'], $datos[$i]['nombre'], $datos[$i]['area'], $datos[$i]['foto']),
                    "eliminar" => concatenaEliminaMecanico($datos[$i]['id_mecanico'],$datos[$i]['nombre'])
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
                "nombre" => "No hay mecánicos",
                "area" => " ",
                "foto" => " ",
                "gaveta" => " "
            );
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );

            echo json_encode($resultados);
        }

        //echo json_encode($mecanicos);
        break;

    case "registrar_herramienta":
        $imagen = $_FILES["foto-herramienta"];
        $tamaño = $imagen['size'];
        if (isset($_POST['nombreH'], $_POST['descripcionH']) && !empty($_POST['nombreH']) && !empty($_POST['descripcionH'])) {
            $nombreH = $_POST["nombreH"];
            $descripcion = $_POST["descripcionH"];
            $pz = $_POST["pz"];
            $cajon = $_POST["cajon"];
            $costo = $_POST["costo"];
            $estado = '0';
            $anomalia = $_POST["anomalia"];
            $id_log = $_POST['id_log_new_H'];
            //If cuando la foto no existe
            if (!isset($imagen['name']) || empty($imagen['name'])) {
                $ruta = "sinfoto.png";
                if ($inv->RegistrarHerramienta($nombreH, $descripcion, $ruta, $cajon, $costo, $estado, $anomalia, $pz, $id_log)) {
                    $response = "success";
                }
            } else { // else en caso de que si exista una foto
                //foto                
                if ($_FILES["foto-herramienta"]["tmp_name"] == "") {
                    $response = "max";
                } else {
                    $imagen = $_FILES["foto-herramienta"];
                    $type = pathinfo($imagen["name"], PATHINFO_EXTENSION);
                    $ruta = md5($imagen["tmp_name"]) . "." . $type;
                    $rutaG = "imagenes/Herramientas/" . $ruta;
                    if ($inv->RegistrarHerramienta($nombreH, $descripcion, $ruta, $cajon, $costo, $estado, $anomalia, $pz, $id_log)) {
                        if ($tamaño > 40000) {
                            $compressedImage = compressImage($imagen["tmp_name"], $rutaG, 75);
                            $response = "success";
                        } else {
                            $response = "success";
                            move_uploaded_file($imagen["tmp_name"], $rutaG);
                        }
                    } else {
                        $response = "error";
                    }
                }
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "registrar_mecanico":
        if (!empty($_POST['nombreM'])) {
            $nombreM = $_POST['nombreM'];
            $area = $_POST['area'];
            $foto = $_FILES["foto_mecanico"];
            $id_log = $_POST['id_log_newM'];
            if (!isset($foto['name']) || empty($foto['name'])) {
                $foto = null;
                if ($inv->RegistrarMecanico($nombreM, $area, $foto,$id_log)) {
                    $response = "success";
                } else {
                    $response = "failed";
                }
            } else {
                if ($_FILES["foto_mecanico"]["tmp_name"] == "") {
                    $response = "max";
                } else {
                    $foto = $_FILES["foto_mecanico"];
                    $tamaño = $foto['size'];
                    $type = pathinfo($foto["name"], PATHINFO_EXTENSION);
                    $ruta = md5($foto["tmp_name"]) . "." . $type;
                    $rutaG = "imagenes/mecanico/" . $ruta;
                    if ($inv->RegistrarMecanico($nombreM, $area, $ruta,$id_log)) {
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
            $response = "requerid";
        }
        echo $response;
        break;

    case "registrar_gabeta":
        if (isset($_POST["nombre"], $_POST["descripcion"], $_POST["cantidad"], $_POST["mecanico"]) && !empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["cantidad"])  && !empty($_POST["mecanico"])) {
            if ($_POST["cantidad"] > 13) {
                $response = "exceeded";
            } else {
                $nombre = $_POST["nombre"];
                $descripcion = $_POST["descripcion"];
                $cantidad = $_POST["cantidad"];
                $mecanico = $_POST["mecanico"];
                $estatus = 'activo';
                $id_log = $_POST['id_log'];
                if ($inv->RegistratGabeta($nombre, $descripcion, $cantidad, $mecanico, $estatus, $id_log)) {
                    $id_gabeta = $inv->ObtenerUltimaGabeta();
                    $num_cajones = $inv->ObtenerNumCajones($id_gabeta);
                    for ($i = 1; $i <= $num_cajones; $i++) {
                        $nomg = 'Cajon ' . $i;
                        if ($inv->RegistrarCajon($nomg, $id_gabeta, $id_log)) {
                            $response = "success";
                        } else {
                            $response = "error2";
                        }
                    }
                } else {
                    $response = "failed";
                }
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "editar_gaveta":
        if (isset($_POST['idG'], $_POST['nombreN'], $_POST['descripcionN']) && !empty($_POST['nombreN']) && !empty($_POST['descripcionN'])) {
            $idG = $_POST['idG'];
            $nombreE = $_POST['nombreN'];
            $descripcionE = $_POST['descripcionN'];
            $id_log = $_POST['id_log'];
            if ($inv->editarGabeta($nombreE, $descripcionE, $idG,$id_log)) {
                $response = "success";
            } else {
                $response = "error";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;
    case "registrar_cajon":
        if (isset($_POST['idG']) && !empty($_POST['nombre_cajon'])) {
            $idG = $_POST['idG'];
            $nombre_cajon = $_POST['nombre_cajon'];
            $id_log = $_POST['id_log'];
            if ($inv->RegistrarCajon($nombre_cajon, $idG, $id_log)) {
                $response = "success";
            } else {
                $response = "failed";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "consultar_gabetas":
        $gabetas = $inv->ConsultarGabetas($id);
        echo json_encode($gabetas);
        break;

    case "imprimir_gaveta":
        $id_gabeta = $_POST['id'];
        $gabetas = $inv->ImprimirGavetas($id_gabeta);
        echo json_encode($gabetas);        
        break;

    case "consultar_cajones":
        $id_gabeta = $_POST["id_gabeta"];
        $cajones = $inv->ConsultarCajones($id_gabeta);
        echo json_encode($cajones);
        break;    

    case "consultar_Herramientas_Cajon":
        $id_cajon = $_POST["id_cajon"];
        $nombre = $_POST["nombre"];
        $herramientas = $inv->ConsultarHerramientasCajon($id_cajon);
        $comillaS = "'";
        if (!empty($herramientas)) {
            for ($i = 0; $i < count($herramientas); $i++) {
                $list[] = array(
                    "nombre" => '<td alig>' . $herramientas[$i]['nombre'] . '</td>',
                    "descripcion" => '<td>' . $herramientas[$i]['descripcion'] . '</td>',
                    "costo" => $herramientas[$i]['costo'],
                    "piezas" => $herramientas[$i]['piezas'],
                    "anomalia" => $herramientas[$i]['anomalia'],
                    "foto" => concatenaImg($herramientas[$i]['nombre'],$herramientas[$i]['foto']),
                    "editar" => concatena($herramientas[$i]['idHerramienta'], $herramientas[$i]['nombre'], $id_cajon, $nombre),
                    "eliminar" => concatenaE($herramientas[$i]['idHerramienta'], $herramientas[$i]['nombre'])
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
                "nombre" => 'No hay herramientas',
                "descripcion" => " ",
                "costo" => " ",
                "piezas" => " ",
                "anomalia" => " ",
                "foto" => " ",
                "editar" => " ",
                "eliminar" => " "

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

    case "actualizar_nombre_cajon":
        if (isset($_POST["nombre"], $_POST["id_cajon"]) && !empty($_POST["nombre"]) && !empty($_POST["id_cajon"])) {
            $nombre = $_POST["nombre"];
            $id_cajon = $_POST["id_cajon"];
            $id_log = $_POST['id_log'];
            if ($inv->ActualizarNombreCajon($nombre, $id_cajon, $id_log)) {
                $nuevonombre = $inv->ObtenerNombreCajon($id_cajon);
                $response = $nuevonombre;
            } else {
                $response = "failed";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "consultar_detalle_herramienta":
        $idHerramienta = $_POST["idHerramienta"];
        $detalle = $inv->ConsultarDetalleHerramienta($idHerramienta);
        echo json_encode($detalle);
        break;

    case "validar_clave_secreta":
        if (isset($_POST["secreta"]) && !empty($_POST["secreta"])) {
            $idusuario = $_SESSION["user"]["idusuario"];
            $secreta = $_POST["secreta"];
            $secretaE = $inv->encryption($secreta);
            if ($inv->ValidarClaveSecreta($idusuario, $secretaE)) {
                $response = "success";
            } else {
                $response = "notfound";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "obtener_herramienta_por_id":
        if (isset($_POST["idHerramienta"]) && !empty($_POST["idHerramienta"])) {
            $data = $inv->ObtenerHerramientaPorId($_POST["idHerramienta"]);
            echo json_encode($data);
        }
        break;

    case "modificar_herramienta":
        if (isset($_POST["idHerredt"], $_POST["edtnombre"], $_POST["edtdescripcion"], $_POST["edtpz"], $_POST["edtcosto"]) && !empty($_POST["idHerredt"]) && !empty($_POST["edtnombre"]) && !empty($_POST["edtdescripcion"]) && !empty($_POST["edtpz"]) && !empty($_POST["edtcosto"])) {
            $idHerramienta = $_POST["idHerredt"];
            $nombre = $_POST["edtnombre"];
            $descripcion = $_POST["edtdescripcion"];
            $piezas = $_POST["edtpz"];
            $costo = $_POST["edtcosto"];
            $anomalia = $_POST["edtanomalia"];
            $foto = $_FILES["filedt"];
            $fotoDefault = $_POST["nom_file"];
            $id_log = $_POST['id_log_upt_H'];
            if (!isset($foto['name']) || empty($foto['name'])) {
                if ($inv->ActualizarHerramienta($fotoDefault, $idHerramienta, $nombre, $descripcion, $piezas, $costo, $anomalia, $id_log)) {
                    $response = "success";
                } else {
                    $response = "failed";
                }
            } else {
                if ($_FILES["filedt"]["tmp_name"] == "") {
                    $response = "max";
                } else {
                    $foto = $_FILES["filedt"];
                    $tamaño = $foto['size'];
                    $type = pathinfo($foto["name"], PATHINFO_EXTENSION);
                    $ruta = md5($foto["tmp_name"]) . "." . $type;
                    $rutaG = "imagenes/Herramientas/" . $ruta;
                    if ($inv->ActualizarHerramienta($ruta, $idHerramienta, $nombre, $descripcion, $piezas, $costo, $anomalia, $id_log)) {
                        if ($tamaño > 40000) {
                            $compressedImage = compressImage($foto["tmp_name"], $rutaG, 75);
                            $response = "success";
                        } else {
                            $response = "success";
                            move_uploaded_file($foto["tmp_name"], $rutaG);
                        }
                        if ($fotoDefault != 'sinfoto.png') {
                            unlink("imagenes/Herramientas/" . $fotoDefault);
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

    case "actualizar_mecanico":
        if (isset($_POST["nombreME"], $_POST["id_meca_E"]) && !empty($_POST["nombreME"]) && !empty($_POST["id_meca_E"])) {
            $id_meca_E = $_POST["id_meca_E"];
            $nombreME = $_POST["nombreME"];
            $areaME = $_POST["areaME"];
            $foto_mecanico_e = $_FILES["foto_mecanico_e"];
            $foto_def_E = $_POST["name_file"];
            $id_log = $_POST['id_log_uptM'];
            if (!isset($foto_mecanico_e['name']) || empty($foto_mecanico_e['name'])) {
                if ($inv->EditarMecanico($id_meca_E, $nombreME, $areaME, $foto_def_E,$id_log)) {
                    $response = "success";
                } else {
                    $response = "failed";
                }
            } else {
                if ($_FILES["foto_mecanico_e"]["tmp_name"] == "") {
                    $response = "max";
                } else {
                    $foto_mecanico_e = $_FILES["foto_mecanico_e"];
                    $tamaño = $foto_mecanico_e['size'];
                    $type = pathinfo($foto_mecanico_e["name"], PATHINFO_EXTENSION);
                    $ruta = md5($foto_mecanico_e["tmp_name"]) . "." . $type;
                    $rutaG = "imagenes/mecanico/" . $ruta;
                    if ($inv->EditarMecanico($id_meca_E, $nombreME, $areaME, $ruta,$id_log)) {
                        if ($tamaño > 40000) {
                            $compressedImage = compressImage($foto_mecanico_e["tmp_name"], $rutaG, 75);
                            $response = "success";
                        } else {
                            $response = "success";
                            move_uploaded_file($foto_mecanico_e["tmp_name"], $rutaG);
                        }
                        if ($foto_def_E != 'sinFotoPerf.png') {
                            unlink("imagenes/mecanico/" . $foto_def_E);
                        }
                    } else {
                        $response = "failed";
                    }
                }
                //echo $_FILES["foto_mecanico_e"]["tmp_name"];
                // list($width, $height) = getimagesize($_FILES["foto_mecanico_e"]["tmp_name"]);
                // //                echo $width.$height;
                // if (($width - $height) > 999) {

                // } else {

                // }
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

    case "eliminar_herramienta":
        if (isset($_POST["idHerramienta"]) && !empty($_POST["idHerramienta"])) {
            $idHerramienta = $_POST["idHerramienta"];
            $estado = 1;
            $id_log = $_POST['id_log'];
            $nom = $_POST['nom'];
            if ($inv->EliminarHerramienta($idHerramienta, $estado, $id_log, $nom)) {
                $response = "success";
            } else {
                $response = "failed";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;
    case "eliminar_mecanico":
        if (isset($_POST["id_mecanico"]) && !empty($_POST["id_mecanico"])) {
            $id_mecanico = $_POST["id_mecanico"];
            $id_log = $_POST['id_log'];
            $nombreU = $_POST['nombre'];
            $gavetas = $inv->GavetasXmecanico($id_mecanico);
            if (!empty($gavetas)) {
                $x = 0;
                for ($i = 0; $i < count($gavetas); $i++) {
                    $gavetasArray[$i] = $gavetas[$i]['id_gabeta'];
                    $cajones = $inv->CajonesXgabeta($gavetas[$i]['id_gabeta']);
                    if (!empty($cajones)) {
                        for ($y = 0; $y < count($cajones); $y++) {
                            $cajonesArray[$x] = $cajones[$y]['id_cajon'];
                            $x++;
                        }
                    }
                }
                if ($inv->EliminarMecanico($id_mecanico, $gavetasArray, $cajonesArray, $id_log, $nombreU)) {
                    $response = 'success';
                } else {
                    $response = "failed";
                }
            } else {
                $gavetasArray = [];
                $cajonesArray = [];
                if ($inv->EliminarMecanico($id_mecanico, $gavetasArray, $cajonesArray,$id_log, $nombreU)) {
                    $response = 'success';
                } else {
                    $response = "failed";
                }
            }
            //Te quedaste aqui                         
        } else {
            $response = "failed";
        }
        echo $response;
        break;
    case "eliminar_gabeta":
        if (isset($_POST["id_gabeta"])) {
            $id_gabeta = $_POST["id_gabeta"];
            $estatus = 'inactivo';
            $id_log = $_POST['id_log'];
            $nom = $_POST['nom'];
            $cajones = $inv->CajonesXgabeta($id_gabeta);
            if (!empty($cajones)) {
                for ($i = 0; $i < count($cajones); $i++) {
                    $cajonesArray[$i] = $cajones[$i]['id_cajon'];
                }
                if ($inv->EliminarGabeta($id_gabeta, $estatus, $id_log, $nom) && $inv->eliminarHerraXcajones($cajonesArray, $id_log, $nom) == 'success') {
                    $response = "success";
                } else {
                    $response = "failed";
                }
            } else {
                if ($inv->EliminarGabeta($id_gabeta, $estatus, $id_log, $nom)) {
                    $response = "success";
                } else {
                    $response = "failed";
                }
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

        // case "agregar_cajon":

        //     break;

    case "eliminar_cajon":
        if (isset($_POST["id_cajon"]) && !empty($_POST["id_cajon"])) {
            $id_cajon = $_POST["id_cajon"];
            $estatus = 'inactivo';
            $id_log = $_POST['id_log'];
            $nom = $_POST['nom'];
            if ($inv->EliminarCajon($id_cajon, $estatus, $id_log, $nom)) {
                $response = "success";
            } else {
                $response = "failed";
            }
        } else {
            $response = "requerid";
        }
        echo $response;
        break;

        // case "baja_inventario":
        //     if (isset($_POST["idHerramienta"]) && !empty($_POST["idHerramienta"])) {
        //         $idHerramienta = $_POST["idHerramienta"];
        //         $inventario = 'baja';
        //         if ($inv->BajaInventario($idHerramienta, $inventario)) {
        //             $response = "success";
        //         } else {
        //             $response = "failed";
        //         }
        //     } else {
        //         $response = "requerid";
        //     }
        //     echo $response;
        //     break;
    case "lista_Busca_herra":

        $datos = $inv->listaBHerramientas();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "desc" => $datos[$i]['descripcion'],
                    "costo" => $datos[$i]['costo'],
                    "piezas" => $datos[$i]['piezas'],
                    "anomalia" => $datos[$i]['anomalia'],
                    "foto" => '<img src="imagenes/Herramientas/' . $datos[$i]['foto'] . '" style="height:100px; width:105px;" alt="Tool photo">',
                    "resp" => $datos[$i]['responsable'],
                    "area" => $datos[$i]['area'],
                    "gaveta" => $datos[$i]['gaveta'],
                    "cajon" => $datos[$i]['cajon']
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
                "nombre" => "No hay herramientas disponibles",
                "desc" => " ",
                "costo" => " ",
                "piezas" => " ",
                "anomalia" => " ",
                "foto" => " ",
                "resp" => " ",
                "area" => " ",
                "gaveta" => " ",
                "cajon" => " "
            );
            $resultados = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData" => $list
            );

            echo json_encode($resultados);
        }

        //echo json_encode($mecanicos);
        break;
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
    //  $ancho_original = imagesx($image);
    //  $alto_original = imagesy($image);

    //  $tmp = imagecreatetruecolor($alto_original,$ancho_original);
    //  imagecopy($tmp, $image,0,0,0,0, $alto_original, $ancho_original);
    imagejpeg($image, $destination, $quality);
    // if ($ancho_original <= $nAncho && $alto_original <= $nAlto) { //Si la imagen es menor a las dimensiones establecidas entonces se guarda así.
    //     imagejpeg($image, $destination, $quality);
    //     echo "no se redimensiono";
    // } else { //Si la imagen es mayor a las dimensiones establecidas entonces hay que calcular sus nuevas dimensiones        
    //     if ($ancho_original >= $alto_original) { //Horizontal
    //         $nAncho = $nAncho;
    //         $nAlto = ($nAncho * $alto_original) / $ancho_original;
    //     } else { //Vertical
    //         $nAlto = $nAlto;
    //         $nAncho = ($ancho_original / $alto_original) * $nAlto;
    //     }

    //     $tmp = imagecreatetruecolor($nAncho, $nAlto);
    //     imagecopyresampled($tmp, $image, 0, 0, 0, 0, $nAncho, $nAlto, $ancho_original, $alto_original);
    //     // Guardamos la imagen
    //     imagejpeg($tmp, $destination, $quality);
    //     echo "Si se redimensiono";
    // }

    // Devolvemos la imagen comprimida
    return $destination;
}

function concatena($id, $nombre, $idCajon, $nombreCajon)
{
    $nc = "'" . $nombreCajon . "'";
    $nomc = "'" . $nombre . "'";
    $cad = '<input type="image" src="imagenes/editar.png" width="33px" data-toggle="modal" data-target="#captcha_herramienta" onclick="ObtenerHerramientaEditar(' . $id . ',' . $nomc . ',' . $idCajon . ',' . $nc . ')">';
    return $cad;
}

function concatenaE($id, $nombre)
{
    $nomc = "'" . $nombre . "'";
    $cad = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#captcha_herramienta_elimina" onclick="ObtenerHerramientaEliminar(' . $id . ',' . $nomc . ')"><i class="fas fa-trash-alt"></i></button>';
    return $cad;
}

function concatenaEditaUsuario($id, $nombre, $area, $foto)
{
    $nom = "'" . $nombre . "'";
    $ar = "'" . $area . "'";
    $img = "'" . $foto . "'";
    $cad = '<input type="image" src="imagenes/editar.png" width="36px" data-toggle="modal" data-target="#editar_mecanico" onclick="editaFormMecanico(' . $id . ',' . $nom . ',' . $ar . ',' . $img . ')">';
    return $cad;
}

function concatenaImg($nombreH,$foto){
    $nom = "'".$nombreH."'";
    $fotico = "'".$foto."'";
    $cad = '<img src="imagenes/Herramientas/' . $foto . '" style="height:100px; width:105px;" data-toggle="modal" data-target="#mostrarImagen" onclick="imageView('.$nom.','.$fotico.')" alt="Tool photo">';
    return $cad;
}

function concatenaEliminaMecanico($id,$nombre){
    $nom = "'".$nombre."'";
    $cad = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#captcha_mecanico_elimina" onclick="captchaEliminaMecanico(' . $id. ',' . $nom . ')"><i class="fas fa-trash-alt"></i></button>';
    return $cad;
}
