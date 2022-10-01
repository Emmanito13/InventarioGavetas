<?php
session_start();
require "Papelera.php";

$pape = new Papelera();

if (isset($_SESSION['id_user'])) {
    $idUsuario =  $_SESSION['id_user'];
}

switch ($_REQUEST["operador"]) {
    case "lista_gavetas":
        $datos = $pape->listaGavetas();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "descripcion" => $datos[$i]['descripcion'],
                    "responsable" => $datos[$i]['responsable'],
                    "recuperar" => concatenaRecuperaG($datos[$i]['id_gabeta'], $datos[$i]['nombre'])
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
                "nombre" => 'No hay gavetas eliminadas',
                "descripcion" => ' ',
                "responsable" => ' ',
                "recuperar" => ' '
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

    case 'lista_cajones':
        $datos = $pape->listaCajones();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "gaveta" => $datos[$i]['gaveta'],
                    "ver" => concatena($datos[$i]['id_cajon'], $datos[$i]['nombre']),
                    "recuperar" => concatenaRecuperaC($datos[$i]['id_cajon'], $datos[$i]['nombre'])
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
                "nombre" => 'No hay cajones eliminados',
                "gaveta" => ' ',
                "ver" => ' ',
                "recuperar" => ' '
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

    case 'lista_herramientas':
        $datos = $pape->listaHerramienta();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "descripcion" => $datos[$i]['descripcion'],
                    "costo" => $datos[$i]['costo'],
                    "piezas" => $datos[$i]['piezas'],
                    "anomalia" => $datos[$i]['anomalia'],
                    "cajon" => $datos[$i]['cajon'],
                    "foto" => '<img src="imagenes/Herramientas/' . $datos[$i]['foto'] . '" style="height:100px; width:105px;" alt="Tool photo">',
                    "recuperar" => concatenaRecuperaH($datos[$i]['idHerramienta'], $datos[$i]['nombre'])
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
                "nombre" => 'No hay herramientas eliminadas',
                "descripcion" => ' ',
                "costo" => ' ',
                "piezas" => ' ',
                "anomalia" => ' ',
                "cajon" => ' ',
                "foto" => ' ',
                "recuperar" => ' '
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

    case "lista_mecanicos":
        $datos = $pape->listaMecanicos();
        if (!empty($datos)) {
            for ($i = 0; $i < count($datos); $i++) {
                $list[] = array(
                    "nombre" => $datos[$i]['nombre'],
                    "area" => $datos[$i]['area'],
                    "foto" => '<img src="imagenes/mecanico/' . $datos[$i]['foto'] . '" style="height:100px; width:105px;" alt="Tool photo">',
                    "recuperar" => concatenaRecuperaM($datos[$i]['id_mecanico'], $datos[$i]['nombre'])
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
                "nombre" => 'No hay mecánicos eliminados',
                "area" => ' ',
                "foto" => ' ',
                "recuperar" => ' '
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
        // case "consultar_mecanico_gabeta":
        //     $id_gaveta = $_POST['id'];
        //     $meca = $pape->MecanicoAsigandoD($id_gaveta);
        //     if($meca != ""){
        //         echo $meca;
        //     }else{
        //         echo $meca = "";
        //     }        
        //     break;
    case "recupera_gaveta":
        $id_gaveta = $_POST['id_gaveta'];
        $id_meca = $_POST['id_meca'];
        $id_log = $_POST['id_log'];
        $nom = $_POST['nom'];
        if ($pape->RecuperaGaveta($id_gaveta, $id_meca, $id_log, $nom)) {
            $response = "success";
        } else {
            $response = "fail";
        }
        echo $response;
        break;

    case "recupera_cajon":
        $id_cajon = $_POST['id_cajon'];
        $id_gaveta = $_POST['id_gaveta'];
        $id_log = $_POST['id_log'];
        $nom = $_POST['nom'];
        if ($pape->RecuperaCajon($id_cajon, $id_gaveta, $id_log, $nom)) {
            $response = "success";
        } else {
            $response = "fail";
        }
        echo $response;
        break;

    case "recupera_herramienta":
        $id_herramienta = $_POST['id_herramienta'];
        $id_cajon = $_POST['id_cajon'];
        $id_log = $_POST['id_log'];
        $nom = $_POST['nom'];
        if ($pape->RecuperaHerramienta($id_herramienta, $id_cajon, $id_log, $nom)) {
            $response = "success";
        } else {
            $response = "fail";
        }
        echo $response;
        break;

    case "gavetas_disponibles":
        $id_meca = $_POST['id_meca'];
        $gavetas = $pape->GabetasDisponibles($id_meca);
        echo json_encode($gavetas);
        break;

    case "cajones_disponibles_x_meca":
        $id_meca = $_POST['id_meca'];
        $cajones = $pape->CajonesDisponiblesXMeca($id_meca);
        echo json_encode($cajones);
        break;

    case "cajones_disponibles":
        $id_gaveta = $_POST['id_gaveta'];
        $cajones = $pape->CajonesDisponibles($id_gaveta);
        echo json_encode($cajones);
        break;

    case "recupera_mecanico":
        $id_meca = $_POST['id_meca'];
        $nom = $_POST['nom'];
        if ($pape->RecuperaMecanico($id_meca, $idUsuario, $nom)) {
            $response = "success";
        } else {
            $response = "fail";
        }
        echo $response;
        break;

    case "consultar_Herramientas_Cajon":
        $id_cajon = $_POST["id_cajon"];
        $nombre = $_POST["nombre"];
        $herramientas = $pape->ConsultarHerramientasCajon($id_cajon);
        $comillaS = "'";
        if (!empty($herramientas)) {
            for ($i = 0; $i < count($herramientas); $i++) {
                $list[] = array(
                    "nombre" => '<td alig>' . $herramientas[$i]['nombre'] . '</td>',
                    "descripcion" => '<td>' . $herramientas[$i]['descripcion'] . '</td>',
                    "costo" => $herramientas[$i]['costo'],
                    "piezas" => $herramientas[$i]['piezas'],
                    "anomalia" => $herramientas[$i]['anomalia'],
                    "foto" => "<img src='imagenes/Herramientas/" . $herramientas[$i]['foto'] . "' style='height:100px; width:105px;' alt='Tool photo'>"
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
                "foto" => " "

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
}

function concatena($idCajon, $nombreCajon)
{
    $nc = "'" . $nombreCajon . "'";
    $cad = '<input type="image" src="imagenes/editar.png" width="33px" data-toggle="modal" data-target="#herramienta_cajon" onclick="obtenerHerramientasCajon(' . $idCajon . ','  . $nc . ')">';
    return $cad;
}

function concatenaRecuperaM($id, $nombre)
{
    $nom = "'" . $nombre . "'";
    $cad = '<input type="image" src="imagenes/reci.png" width="33px" onclick="recuperaMecanico(' . $id . ',' . $nom . ')">';
    return $cad;
}

function concatenaRecuperaG($id, $nombre)
{
    $nom = "'" . $nombre . "'";
    $cad = '<input type="image" data-toggle="modal" data-target="#recupera_gaveta" src="imagenes/reci.png" width="33px" onclick="formRecuperaGaveta(' . $id . ',' . $nom . ')">';
    return $cad;
}


function concatenaRecuperaC($id, $nombre)
{
    $nom = "'" . $nombre . "'";
    $cad = '<input type="image" data-toggle="modal" data-target="#recupera_cajon" src="imagenes/reci.png" width="33px" onclick="formRecuperaCajon(' . $id . ',' . $nom . ')">';
    return $cad;
}


function concatenaRecuperaH($id, $nombre)
{
    $nom = "'" . $nombre . "'";
    $cad = '<input type="image" data-toggle="modal" data-target="#recupera_herramienta" src="imagenes/reci.png" width="33px" onclick="formRecuperaHerramienta(' . $id . ',' . $nom . ')">';
    return $cad;
}
