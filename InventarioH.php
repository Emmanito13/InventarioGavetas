<?php
define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$CARLOS@2016');
define('SECRET_IV', '101712');
require "config/Conexion.php";
//require "config/ConexionG.php";

class Inventario
{

    public $cnx;
    //public $cnxG;

    function __construct()
    {
        $this->cnx = Conexion::ConectarDB();
        //$this->cnxG = Conexion::ConectarDBG();
    }

    function ListarHerramientas()
    {
        //$query = "SELECT he.idHerramienta, he.nombre, he.descripcion, he.foto, he.estado, he.eli, he.falla, mec.nombre as nombreMec, mec.idusuario FROM inv_herramienta he INNER JOIN usuarios mec ON he.ideMecanico=mec.idusuario WHERE eli=0 AND estado= 0 ORDER BY idusuario DESC";
        $query = "SELECT * FROM inv_herramienta WHERE estado = 0";
        $result = $this->cnx->prepare($query);
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

    function ListarHerramientasPDF($buscar)
    {
        $query = "SELECT he.idHerramienta, he.nombre, he.descripcion, he.foto, he.estado, he.eli, he.falla, mec.nombre as nombreMec, mec.ideMecanico FROM inv_herramienta he INNER JOIN usuarios mec ON he.ideMecanico=mec.idusuario WHERE eli=0 AND (nombre LIKE '%" . $buscar . "%' OR descripcion LIKE '%" . $buscar . "%') AND estado= 0 ORDER BY idusuario DESC";
        $result = $this->cnx->prepare($query);
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

    function ListarMaquinas()
    {
        $query = "SELECT ma.idmaquina,ma.nombre, ma.marca, ma.modelo, ma.nserie, ma.codigo, ma.fadquisicion, ma.costo, ma.foto, ma.estado, ma.eli, ma.falla, mec.nombreMec, mec.ideMecanico FROM inv_maquinash ma INNER JOIN inv_mecanico mec ON ma.ideMecanico=mec.ideMecanico WHERE eli=0 AND estado=0 ORDER BY idmaquina DESC";
        $result = $this->cnx->prepare($query);
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

    function ConsultarMecanicos()
    {
        $query = "SELECT * FROM usuarios WHERE tipo=2 AND estatus='activo' ORDER BY idusuario DESC";
        $result = $this->cnx->prepare($query);
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

    function listaMecanicos()
    {
        $query = "SELECT id_mecanico,nombre,area,foto,estatus FROM mecanicos WHERE estatus='activo' ORDER BY id_mecanico DESC";
        $result = $this->cnx->prepare($query);
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

    function RegistrarHerramienta($nombre, $descripcion, $foto, $cajon, $costo, $estado, $anomalia, $pz, $idLog)
    {
        $query = "INSERT INTO inv_herramienta(foto, nombre, descripcion, costo, piezas, estado, anomalia, id_cajon) VALUES (?,?,?,?,?,?,?,?)";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $foto);
        $result->bindParam(2, $nombre);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $costo);
        $result->bindParam(5, $pz);
        $result->bindParam(6, $estado);
        $result->bindParam(7, $anomalia);
        $result->bindParam(8, $cajon);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Registró la herramienta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function RegistrarMaquina($nombre, $marca, $modelo, $nserie, $codigo, $fadquisicion, $costo, $foto, $idMecanico, $falla)
    {
        $query = "INSERT INTO inv_maquinash(nombre, marca, modelo, nserie, codigo, fadquisicion, costo, foto, falla, ideMecanico) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $marca);
        $result->bindParam(3, $modelo);
        $result->bindParam(4, $nserie);
        $result->bindParam(5, $codigo);
        $result->bindParam(6, $fadquisicion);
        $result->bindParam(7, $costo);
        $result->bindParam(8, $foto);
        $result->bindParam(9, $falla);
        $result->bindParam(10, $idMecanico);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function RegistratGabeta($nombre, $descripcion, $cantidad, $mecanico, $estatus, $idLog)
    {
        $query = "INSERT INTO inv_gabeta(nombre, descripcion, num_cajones, idmecanico, estatus) VALUES (?,?,?,?,?)";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $descripcion);
        $result->bindParam(3, $cantidad);
        $result->bindParam(4, $mecanico);
        $result->bindParam(5, $estatus);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Registró gaveta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        }
        return false;
    }

    function editarGabeta($nombre, $descripcion, $id_gabeta, $idLog)
    {
        $query = "UPDATE inv_gabeta SET nombre = ?, descripcion = ? WHERE id_gabeta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $descripcion);
        $result->bindParam(3, $id_gabeta);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Actualizó la gaveta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function ConsultarGabetas($id)
    {
        $query = "SELECT G.id_gabeta, G.nombre, G.descripcion, G.num_cajones, G.idmecanico, M.nombre as responsable, M.foto FROM inv_gabeta G INNER JOIN mecanicos M ON M.id_mecanico = G.idmecanico WHERE G.estatus='activo' AND M.id_mecanico = ? ORDER BY G.id_gabeta DESC";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id);
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

    function ImprimirGavetas($id_gabeta)
    {
        $query = "SELECT C.nombre as cajon,H.nombre,H.descripcion,H.costo,H.piezas,H.anomalia,H.foto FROM
        inv_herramienta as H INNER JOIN inv_cajones AS C ON H.id_cajon = C.id_cajon
        WHERE H.estado = 0 AND C.estatus = 'activo' AND C.id_gabeta = ? ORDER BY cajon ASC";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_gabeta);
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

    function ImprimirGavetasMecanico($id_mecanico)
    {
        $query = "SELECT G.nombre AS gaveta,C.nombre AS cajon,H.nombre,H.descripcion,H.costo,H.piezas,H.anomalia,H.foto FROM
        mecanicos INNER JOIN inv_gabeta AS G ON mecanicos.id_mecanico = G.idmecanico
        INNER JOIN inv_cajones AS C ON C.id_gabeta = G.id_gabeta 
        INNER JOIN inv_herramienta AS H ON H.id_cajon = C.id_cajon 
        WHERE mecanicos.id_mecanico = ? AND mecanicos.estatus = 'activo' AND G.estatus = 'activo' AND C.estatus = 'activo' AND H.estado = 0 ORDER BY gaveta";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_mecanico);
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

    function DatosMecanico($id)
    {
        $query = "SELECT nombre,area,foto FROM mecanicos WHERE id_mecanico = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id);
        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                $datos = [];
            }
        }
    }

    function ObtenerUltimaGabeta()
    {
        $query = "SELECT * FROM inv_gabeta WHERE estatus ='activo' ORDER BY id_gabeta DESC LIMIT 1";
        $result = $this->cnx->prepare($query);
        $result->execute();
        $fila = $result->fetch();

        return $fila["id_gabeta"];
    }

    function ObtenerNumCajones($id_gabeta)
    {
        $query = "SELECT * FROM inv_gabeta WHERE id_gabeta = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_gabeta);
        $result->execute();
        $fila = $result->fetch();

        return $fila["num_cajones"];
    }

    function RegistrarCajon($nomc, $id_gabeta, $idLog)
    {
        $query = "INSERT INTO inv_cajones(nombre,id_gabeta,estatus) VALUES (?,?,'activo')";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nomc);
        $result->bindParam(2, $id_gabeta);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Registró cajón: ' . $nomc;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function RegistrarMecanico($nombre, $area, $foto, $idLog)
    {
        if ($foto == null) {
            $query = "INSERT INTO mecanicos(nombre,area,estatus) VALUES (?,?,'activo')";
            $result = $this->cnx->prepare($query);
            $result->bindParam(1, $nombre);
            $result->bindParam(2, $area);
            if ($result->execute()) {
                $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                $resultLog = $this->cnx->prepare($queryLog);
                $resultLog->bindParam(1, $idLog);
                $cad = 'Registró al mecánico: ' . $nombre;
                $resultLog->bindParam(2, $cad);
                $resultLog->execute();
                return true;
            } else {
                return false;
            }
        } else {
            $query = "INSERT INTO mecanicos(nombre,area,foto,estatus) VALUES (?,?,?,'activo')";
            $result = $this->cnx->prepare($query);
            $result->bindParam(1, $nombre);
            $result->bindParam(2, $area);
            $result->bindParam(3, $foto);
            if ($result->execute()) {
                $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                $resultLog = $this->cnx->prepare($queryLog);
                $resultLog->bindParam(1, $idLog);
                $cad = 'Registró al mecánico: ' . $nombre;
                $resultLog->bindParam(2, $cad);
                $resultLog->execute();
                return true;
            } else {
                return false;
            }
        }
    }

    function ConsultarCajones($id_gabeta)
    {
        $query = "SELECT * FROM inv_cajones WHERE  estatus='activo' and id_gabeta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_gabeta);
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

    function ConsultarHerramientasCajon($id_cajon)
    {
        $query = "SELECT * FROM inv_herramienta WHERE id_cajon = ? AND estado=0 ORDER BY idHerramienta DESC";
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

    function ActualizarNombreCajon($nombre, $id_cajon, $idLog)
    {
        $query = "UPDATE inv_cajones SET nombre = ? WHERE id_cajon = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $id_cajon);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Se cambio el nombre del cajón por : ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function ObtenerNombreCajon($id_cajon)
    {
        $query = "SELECT * FROM inv_cajones WHERE id_cajon = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_cajon);
        $result->execute();
        $fila = $result->fetch();

        return $fila["nombre"];
    }

    function ConsultarDetalleHerramienta($idHerramienta)
    {
        $query = "SELECT * FROM inv_herramienta WHERE idHerramienta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idHerramienta);
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

    function ValidarClaveSecreta($idusuario, $secretaE)
    {
        $query = "SELECT * FROM usuarios WHERE idusuario = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        $result->execute();
        $fila = $result->fetch();
        if ($secretaE == $fila["secreta"]) {
            return $fila;
        }
        return false;
    }

    public static function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public static function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    function ObtenerHerramientaPorId($idHerramienta)
    {
        $query = "SELECT * FROM inv_herramienta WHERE idHerramienta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idHerramienta);
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

    function ActualizarHerramienta($foto, $idHerramienta, $nombre, $descripcion, $piezas, $costo, $anomalia, $idLog)
    {
        $query = "UPDATE inv_herramienta SET foto = ?, nombre = ?, descripcion = ?, costo = ? , piezas = ?, anomalia = ? WHERE idHerramienta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $foto);
        $result->bindParam(2, $nombre);
        $result->bindParam(3, $descripcion);
        $result->bindParam(4, $costo);
        $result->bindParam(5, $piezas);
        $result->bindParam(6, $anomalia);
        $result->bindParam(7, $idHerramienta);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Actualizó la herramienta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function EditarMecanico($id, $nombre, $area, $foto, $idLog)
    {
        $query = "UPDATE mecanicos SET nombre = ?,area = ?,foto = ? WHERE id_mecanico = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $area);
        $result->bindParam(3, $foto);
        $result->bindParam(4, $id);

        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Actualizó al mecánico: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function EliminarHerramienta($idHerramienta, $estado, $idLog, $nombre)
    {
        $query = "UPDATE inv_herramienta SET estado = ? WHERE idHerramienta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $estado);
        $result->bindParam(2, $idHerramienta);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Eliminó la herramienta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function EliminarGabeta($id_gabeta, $estatus, $idLog, $nombre)
    {
        $query1 = "UPDATE inv_gabeta SET estatus = ? WHERE id_gabeta = ?";
        $query2 = "UPDATE inv_cajones SET estatus = ? WHERE id_gabeta = ?";
        $result1 = $this->cnx->prepare($query1);
        $result1->bindParam(1, $estatus);
        $result1->bindParam(2, $id_gabeta);
        $result2 = $this->cnx->prepare($query2);
        $result2->bindParam(1, $estatus);
        $result2->bindParam(2, $id_gabeta);
        if ($result1->execute() && $result2->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Eliminó la gaveta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {

            return false;
        }
    }


    function CajonesXgabeta($id_gabeta)
    {
        $query = "SELECT id_cajon FROM inv_cajones WHERE id_gabeta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_gabeta);

        if ($result->execute()) {
            if ($result->rowCount() > 0) {
                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return $datos[] = null;
            }
        }
        return false;
    }

    function GavetasXmecanico($id_mecanico)
    {
        $query = "SELECT id_gabeta FROM inv_gabeta WHERE idmecanico = ? AND estatus = 'activo'";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $id_mecanico);
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
        return false;
    }

    function eliminarHerraXcajones($arrayCajones, $idLog, $nombre)
    {
        $query = "UPDATE inv_herramienta SET estado = 1 WHERE id_cajon = ?";
        $result = $this->cnx->prepare($query);
        if (count($arrayCajones) > 0) {
            for ($i = 0; $i < count($arrayCajones); $i++) {
                $result->bindParam(1, $arrayCajones[$i]);
                if ($result->execute()) {
                    $res = 'success';
                } else {
                    $res = 'fail';
                }
            }
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Eliminó todas las herramientas de la gaveta: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return $res;
        } else {
            return $res = 'success';
        }
    }

    function EliminarMecanico($id, $arrayGavetas, $arrayCajones, $idLog, $nombre)
    {
        if (empty($arrayGavetas)) {
            $query = "UPDATE mecanicos set estatus = 'inactivo' WHERE id_mecanico = ?";
            $result = $this->cnx->prepare($query);
            $result->bindParam(1, $id);
            if ($result->execute()) {
                $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                $resultLog = $this->cnx->prepare($queryLog);
                $resultLog->bindParam(1, $idLog);
                $cad = 'Eliminó al mecánico: ' . $nombre;
                $resultLog->bindParam(2, $cad);
                $resultLog->execute();
                return true;
            } else {
                return false;
            }
        } else {
            if (empty($arrayCajones)) {
                $query = "UPDATE mecanicos set estatus = 'inactivo' WHERE id_mecanico = ?";
                $result = $this->cnx->prepare($query);
                $result->bindParam(1, $id);
                $result->execute();
                $query1 = "UPDATE inv_gabeta SET estatus = 'inactivo' WHERE id_gabeta = ?";
                $result1 = $this->cnx->prepare($query1);
                for ($i = 0; $i < count($arrayGavetas); $i++) {
                    $result1->bindParam(1, $arrayGavetas[$i]);
                    if ($result1->execute()) {
                        $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                        $resultLog = $this->cnx->prepare($queryLog);
                        $resultLog->bindParam(1, $idLog);
                        $cad = 'Eliminó al mecánico: ' . $nombre;
                        $resultLog->bindParam(2, $cad);
                        $resultLog->execute();
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                $query = "UPDATE mecanicos set estatus = 'inactivo' WHERE id_mecanico = ?";
                $result = $this->cnx->prepare($query);
                $result->bindParam(1, $id);
                $result->execute();

                $query1 = "UPDATE inv_gabeta SET estatus = 'inactivo' WHERE id_gabeta = ?";
                $result1 = $this->cnx->prepare($query1);
                for ($i = 0; $i < count($arrayGavetas); $i++) {
                    $result1->bindParam(1, $arrayGavetas[$i]);
                    $result1->execute();
                }

                $query2 = "UPDATE inv_cajones SET estatus = 'inactivo' WHERE id_cajon = ?";
                $result2 = $this->cnx->prepare($query2);
                for ($j = 0; $j < count($arrayCajones); $j++) {
                    $query3 = "SELECT * FROM inv_herramienta WHERE estado = 0 AND id_cajon = ?";
                    $result3 = $this->cnx->prepare($query3);
                    $result3->bindParam(1, $arrayCajones[$j]);

                    $result3->execute();
                    if ($result3->rowCount() > 0) {
                        $query4 = "UPDATE inv_herramienta SET estado = 1 WHERE id_cajon = ?";
                        $result4 = $this->cnx->prepare($query4);
                        $result4->bindParam(1, $arrayCajones[$j]);
                        $result4->execute();
                    }
                    $result2->bindParam(1, $arrayCajones[$j]);
                    $result2->execute();
                }
                $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                $resultLog = $this->cnx->prepare($queryLog);
                $resultLog->bindParam(1, $idLog);
                $cad = 'Eliminó al mecánico: ' . $nombre;
                $resultLog->bindParam(2, $cad);
                $resultLog->execute();
            }
            return true;
        }
    }

    function EliminarCajon($id, $estatus, $idLog, $nombre)
    {
        $query = "UPDATE inv_cajones SET estatus = ? WHERE id_cajon = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $estatus);
        $result->bindParam(2, $id);
        $query2 = "UPDATE inv_herramienta SET estado = 1 WHERE id_cajon = ?";
        $result2 = $this->cnx->prepare($query2);
        $result2->bindParam(1, $id);
        if ($result->execute() && $result2->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Eliminó el cajón: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function CobrarHerramienta($idmecanico, $idHerramienta, $nombre, $costo, $estatus)
    {
        $query = "INSERT INTO inv_herramientas_faltantes(idherramienta, idmecanico,	herramienta, costo, estatus) VALUES (?,?,?,?,?)";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idHerramienta);
        $result->bindParam(2, $idmecanico);
        $result->bindParam(3, $nombre);
        $result->bindParam(4, $costo);
        $result->bindParam(5, $estatus);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function MarcarCobrado($idHerramienta, $estatus2)
    {
        $query = "UPDATE inv_herramienta SET estatus_cobro = ? WHERE idHerramienta = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $estatus2);
        $result->bindParam(2, $idHerramienta);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function listaBHerramientas()
    {
        $query = "SELECT H.nombre,H.descripcion,H.costo,H.piezas,H.anomalia,H.foto,M.nombre AS responsable,M.area,G.nombre AS gaveta,C.nombre AS cajon FROM
                    mecanicos AS M INNER JOIN inv_gabeta as G ON M.id_mecanico = G.idmecanico 
                    INNER JOIN inv_cajones AS C ON C.id_gabeta = G.id_gabeta
                    INNER JOIN inv_herramienta as H ON H.id_cajon = C.id_cajon
                    WHERE M.estatus = 'activo' AND G.estatus = 'activo' AND C.estatus = 'activo' AND H.estado = 0";
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
}
