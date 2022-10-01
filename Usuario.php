<?php
define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$CARLOS@2016');
define('SECRET_IV', '101712');
require "config/Conexion.php";

class Usuario
{

    public $cnx;

    function __construct()
    {
        $this->cnx = Conexion::ConectarDB();
    }

    function ListarUsuarios()
    {
        $query = "SELECT * FROM usuarios WHERE estatus='activo' and tipo='1'";
        $result = $this->cnx->prepare($query);
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
        return $datos = [];
    }

    function RegistrarUsuario($nombre, $email, $passwordE, $foto, $idLog)
    {
        if ($foto == null) {
            $query = "INSERT INTO usuarios(nombre, email, password, tipo, permisos, estatus) VALUES (?,?,?,1,'ADMIN','activo')";
            $result = $this->cnx->prepare($query);
            $result->bindParam(1, $nombre);
            $result->bindParam(2, $email);
            $result->bindParam(3, $passwordE);
            if ($result->execute()) {
                $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                $resultLog = $this->cnx->prepare($queryLog);
                $resultLog->bindParam(1, $idLog);
                $cad = 'Creó el usuario: ' . $nombre;
                $resultLog->bindParam(2, $cad);
                $resultLog->execute();
                return true;
            } else {
                return false;
            }
        } else {
            $query = "INSERT INTO usuarios(nombre, email, password, foto, tipo, permisos, estatus) VALUES (?,?,?,?,1,'ADMIN','activo')";
            $result = $this->cnx->prepare($query);
            $result->bindParam(1, $nombre);
            $result->bindParam(2, $email);
            $result->bindParam(3, $passwordE);
            $result->bindParam(4, $foto);
            if ($result->execute()) {
                $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
                $resultLog = $this->cnx->prepare($queryLog);
                $resultLog->bindParam(1, $idLog);
                $cad = 'Creó el usuario: ' . $nombre;
                $resultLog->bindParam(2, $cad);
                $resultLog->execute();
                return true;
            } else {
                return false;
            }
        }
    }

    function ObtenerUsuarioPorId($idusuario)
    {
        $query = "SELECT * FROM usuarios WHERE idusuario = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        if ($result->execute()) {
            return $result->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    function EditarUsuario($idusuario, $nombre, $email, $foto, $idLog)
    {
        $query = "UPDATE usuarios SET nombre = ?, email = ?, foto = ? WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $nombre);
        $result->bindParam(2, $email);
        $result->bindParam(3, $foto);
        $result->bindParam(4, $idusuario);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Actualizó el usuario: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        }
        return false;
    }

    function ActualizarFoto($idusuario, $ruta)
    {
        $query = "UPDATE usuarios SET foto = ? WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $ruta);
        $result->bindParam(2, $idusuario);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function EliminarUsuario($idusuario,$nombre,$idLog)
    {
        $query = "UPDATE usuarios SET estatus = 'inactivo' WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Eliminó al usuario: ' . $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function ValidarUsuario($email, $pass)
    {
        $query = "SELECT * FROM usuarios WHERE email = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $email);
        $result->execute();
        $fila = $result->fetch();
        if ($pass == $fila["password"]) {
            return $fila;
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

    function ObtenerPassword($idusuario)
    {
        $query = "SELECT * FROM usuarios WHERE idusuario = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        $result->execute();
        $fila = $result->fetch();

        return $fila["password"];
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

    function AsignarPermiso($idusuario, $permiso)
    {
        $query = "UPDATE usuarios SET permisos = ? WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $permiso);
        $result->bindParam(2, $idusuario);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function BorrarTemporal($idusuario)
    {
        $query = "DELETE FROM store_carrito WHERE idcliente = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function AsignarSecreta($idusuario, $secreta)
    {
        $query = "UPDATE usuarios SET secreta = ? WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $secreta);
        $result->bindParam(2, $idusuario);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function ObtenerSecreta($idusuario)
    {
        $query = "SELECT * FROM usuarios WHERE idusuario = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        $result->execute();
        $fila = $result->fetch();

        return $fila["secreta"];
    }

    function ExisteSecreta($secreta)
    {
        $query = "SELECT count(*) FROM usuarios WHERE secreta = ? ";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        $result->execute();
        $fila = $result->fetch();
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function EliminarClaveSecreta($idusuario)
    {
        $query = "UPDATE usuarios SET secreta = ' ' WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $idusuario);
        if ($result->execute()) {
            return true;
        }
        return false;
    }

    function ePass($id, $pass,$nombre, $idLog)
    {
        $query = "UPDATE usuarios SET password = ? WHERE idusuario = ?";
        $result = $this->cnx->prepare($query);
        $result->bindParam(1, $pass);
        $result->bindParam(2, $id);
        if ($result->execute()) {
            $queryLog = "INSERT INTO log (idUsuario,accion,fecha,hora) VALUES (?,?,CURDATE(),CURTIME())";
            $resultLog = $this->cnx->prepare($queryLog);
            $resultLog->bindParam(1, $idLog);
            $cad = 'Cambió contraseña al usuario: '. $nombre;
            $resultLog->bindParam(2, $cad);
            $resultLog->execute();
            return true;
        } else {
            return false;
        }
    }

    function Bitacora (){
        $query = "SELECT U.nombre as usuario, L.accion, L.fecha, L.hora FROM 
        log as L INNER JOIN usuarios as U ON L.idUsuario = U.idusuario ORDER BY L.fecha,L.hora ASC";
        $result = $this->cnx->prepare($query);
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
        return $datos = [];       
    }
}
