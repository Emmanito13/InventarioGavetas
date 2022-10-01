<?php
require "config/Conexion.php";

class Papelera
{
    public $cnx;

    function __construct()
    {
        $this->cnx = Conexion::ConectarDB();
    }

    function listaGavetas()
    {
        $query = "SELECT G.id_gabeta,G.nombre,G.descripcion,M.nombre AS responsable FROM
        inv_gabeta as G INNER JOIN mecanicos as M ON G.idmecanico = M.id_mecanico
        WHERE G.estatus = 'inactivo' ORDER BY G.nombre ASC";
        $result = $this->cnx->prepare($query);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function listaCajones()
    {
        $query = "SELECT C.id_cajon,C.nombre,G.nombre AS gaveta FROM 
        inv_cajones as C INNER JOIN inv_gabeta AS G ON C.id_gabeta = G.id_gabeta
        WHERE C.estatus = 'inactivo' ORDER BY C.nombre ASC";
        $result = $this->cnx->prepare($query);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function listaHerramienta()
    {
        $query = "SELECT H.idHerramienta,H.nombre,H.descripcion,H.costo,H.piezas,H.anomalia,C.nombre AS cajon,H.foto FROM
        inv_herramienta AS H INNER JOIN inv_cajones AS C ON H.id_cajon = C.id_cajon
        WHERE H.estado = 1 ORDER BY H.nombre ASC";
        $result = $this->cnx->prepare($query);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function listaMecanicos()
    {
        $query = "SELECT id_mecanico,nombre,area,foto FROM mecanicos WHERE estatus = 'inactivo'";
        $result = $this->cnx->prepare($query);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function MecanicosDiscponibles()
    {
        $query = "SELECT id_mecanico,nombre,area,foto FROM mecanicos WHERE estatus = 'activo'";
        $result = $this->cnx->prepare($query);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    // function MecanicoAsigandoD($id_gaveta){
    //     $query = "SELECT idmecanico FROM inv_gabeta WHERE id_gabeta = ?";
    //     $result = $this->cnx->prepare($query);
    //     $result->bindParam(1,$id_gaveta);
    //     if ($result->execute()) {
    //         if ($result->rowCount() > 0) {
    //             while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
    //                 $datos[] = $fila;
    //             }
    //             return $datos[0]['idmecanico'];
    //         } else {
    //             return $datos = "";
    //         }
    //     }else{
    //         return $datos = "";
    //     }
    // }

    function RecuperaGaveta($id_gaveta, $id_meca, $idLog, $nombre)
    {
        $query = "UPDATE inv_gabeta SET estatus = 'activo',idmecanico = ? WHERE id_gabeta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_meca);
        $result->bindParam(2, $id_gaveta);

        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Recuperó la gaveta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function RecuperaCajon($id_cajon, $id_gaveta, $idLog, $nombre)
    {
        $query = "UPDATE inv_cajones SET estatus = 'activo',id_gabeta = ? WHERE id_cajon = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_gaveta);
        $result->bindParam(2, $id_cajon);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Recuperó el cajón: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function RecuperaHerramienta($id_herramienta, $id_cajon, $idLog, $nombre)
    {
        $query = "UPDATE inv_herramienta SET estado = 0, id_cajon = ? WHERE idHerramienta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_cajon);
        $result->bindParam(2, $id_herramienta);

        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Recuperó la herramienta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function GabetasDisponibles($id_meca)
    {
        $query = "SELECT id_gabeta,nombre FROM inv_gabeta WHERE idmecanico = ? AND estatus = 'activo' ORDER BY nombre ASC";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_meca);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function CajonesDisponiblesXMeca($id_meca)
    {
        $query = "SELECT G.id_gabeta, G.nombre AS nombreG, C.id_cajon, C.nombre AS nombreC FROM 
        mecanicos as M INNER JOIN inv_gabeta as G ON M.id_mecanico = G.idmecanico INNER JOIN 
        inv_cajones AS C ON C.id_gabeta = G.id_gabeta 
        WHERE M.id_mecanico = ? AND G.estatus = 'activo' AND C.estatus = 'activo' ORDER BY nombreC ASC";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_meca);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function CajonesDisponibles ($id_gaveta){
        $query = "SELECT id_cajon,nombre FROM inv_cajones WHERE id_gabeta = ? ORDER BY nombre ASC";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_gaveta);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos = [];
            }
        }
    }

    function RecuperaMecanico($id_meca, $idLog, $nombre)
    {
        $query = "UPDATE mecanicos SET estatus = 'activo' WHERE id_mecanico = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_meca);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Recupero al mecánico: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function ConsultarHerramientasCajon($id_cajon)
    {
        $query = "SELECT * FROM inv_herramienta WHERE id_cajon = ? AND estado=1 ORDER BY idHerramienta DESC";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_cajon);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                echo "";
            }
        }
        return false;
    }
}
